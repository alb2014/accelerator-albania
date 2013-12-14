<?php
App::uses('Vote', 'Accelerator.Model');
App::uses('User', 'Users.Model');
App::uses('CakeEmail', 'Network/Email');

class IdeasController extends AcceleratorAppController {
        public $components = array('Paginator');


    public $paginate = array(
        'limit' => 7,
        'order' => array(
            'Idea.date_created' => 'desc',
            'Idea.total_votes' => 'desc',
            'Idea.up_votes' => 'desc'
        )
    );

    public function index($userId=false) {
        $user = AuthComponent::user();
        $this->Paginator->settings = $this->paginate;
        $conditions = array();
        if ($userId){
            $this->Paginator->settings['conditions']['Idea.userId'] = $userId;
        }
        $ideas = $this->Paginator->paginate('Idea');
        $votes = ClassRegistry::init('Vote');
        if ($user){
            $user_votes = $votes->find('all', array('conditions' =>array('Vote.user_id' => $user['id'])));
            for($i = 0; $i < count($ideas); ++$i) {
                foreach ($user_votes as $vote){
                    if ($ideas[$i]['Idea']['id'] == $vote['Vote']['idea_id']){
                        $ideas[$i]['Idea']['vote.value'] = $vote['Vote']['value'];
                    }
                }
                if (!isset($ideas[$i]['Idea']['vote.value'])){
                    $ideas[$i]['Idea']['vote.value'] = 0;
                }
            }
        }
        $this->set('ideas', $ideas);
        $this->set('faq_node', ClassRegistry::init('Node')->findBySlug('faq'));
    }
	    
    public function add() {
        if ($this->request->is('post')) {
            $this->Idea->create();
            $this->request->data['Idea']['date_created'] = null;
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash(__('Your idea has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your idea.'));
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $idea = $this->Idea->findById($id);
        $user = AuthComponent::user();
        if ($idea['userID'] == $user['id']){
            if ($this->Idea->delete($id)) {
                $this->Session->setFlash(__('The idea with id: %s has been deleted.', h($id)));
                return $this->redirect(array('action' => 'index'));
            }
        } else {

            $this->Session->setFlash(__('You are not authorized to delete this idea.'));
            return $this->redirect(array(
                    'action' => 'view',
                    $id
                ));
        }
    }

    public function view($ideaId = null){
        
        if (!$ideaId) {
            throw new NotFoundException(__('Invalid idea'));
        }

        $idea = $this->Idea->findById($ideaId);

        if (!$idea) {
            throw new NotFoundException(__('Invalid idea'));
        }

        $user = AuthComponent::user();

        $isIdeaOwner = false;

        if($user['id'] == $idea['Idea']['user_id']) {
            $isIdeaOwner = true;
        }

        $this->set('isIdeaOwner', $isIdeaOwner);

        $this->set('idea', $idea);
        $this->set('ideas', ClassRegistry::init('Idea')->find('all', array(
            'limit' => 4,
            'order' => array(
                'Idea.date_created' => 'desc',
                'Idea.total_votes' => 'desc',
                'Idea.up_votes' => 'desc') 
            )
        ));
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__("We couldn't find that idea."));
        }

        $idea = $this->Idea->findById($id);

        if (!$idea) {
            throw new NotFoundException(__("We couldn't find that idea."));
        }


        //check to see if user is the idea owner

        $user = AuthComponent::user();
        
        if($user['id'] != $idea['Idea']['user_id']){
            $this->Session->setFlash(__('You are not authorized to edit this idea.'));
            return $this->redirect(array(
                    'action' => 'view',
                    $id
                ));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Idea->id = $id;
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash(__('Your idea has been updated.'));
                return $this->redirect(array('action' => 'index/'.$user['id']));
            }
            $this->Session->setFlash(__('Unable to update your idea.'));
        }

        if (!$this->request->data) {
            $this->request->data = $idea;
        }
        $this->log($idea);
        $this->set('idea', $idea['Idea']);
    }

    public function vote($ideaId, $value, $async=false){
        switch ($value) {
            case "up":
                 $mod = 1;
                break;
            case "down":
                 $mod = -1;
                break;
            case "unvote":
                $mod = 0;
                break;
        }
        $vote = new Vote();
        $user = AuthComponent::user();
        $data = array('Vote' => array('id' => $ideaId.'-'.$user['id'],
                                      'value' => $mod,
                                      'idea_id' => $ideaId,
                                      'user_id' => $user['id']));
        
        $vote->id = $ideaId.'-'.$user['id'];

        if ($vote->save($data)) {
            $this->Session->setFlash(__('Vote cast!'));
            $this->updateVotes($ideaId);
            return $this->redirect(array('action' => 'index/'));
        }

        $this->Session->setFlash(__('Voting failed.'));
        return $this->redirect(array('action' => 'index'));
    }

    private function updateVotes($ideaId){
        
        $idea = $this->Idea->findById($ideaId);
        $idea = $idea['Idea'];
        $this->Idea->id = $ideaId;
        
        $voteHandle = new Vote();
        $myVotes = $voteHandle->find('all', array('conditions' =>array('Vote.idea_id' => $ideaId)));
        $upvotes = 0;
        $downvotes = 0;

        foreach  ($myVotes as $vote){
            if ($vote['Vote']['value'] > 0){
                $upvotes++;
            }  
            if ($vote['Vote']['value'] < 0){
                $downvotes++;
            }
        }

        $total_votes =  $upvotes - $downvotes;

        // Leveling up logic

        $tier_2_votes_req = Configure::read('Accelerator.tier_2_votes'); 
        $tier_3_votes_req = Configure::read('Accelerator.tier_3_votes');
        $tier_level = $idea['tier_level'];

        if($tier_level == 0 && $upvotes == $tier_2_votes_req) {
            $tier_level++;
            $this->_alertUser($idea, $tier_level);
        } else if($tier_level == 1 && $upvotes == $tier_3_votes_req) {
            $tier_level++;
            $this->_alertUser($idea, $tier_level);
        }

        $this->_alertUser($idea, $tier_level);
        // End leveling up logic

        $data['Idea']['up_votes'] = $upvotes;
        $data['Idea']['down_votes'] = $downvotes;
        $data['Idea']['total_votes'] = $total_votes;
        $data['Idea']['tier_level'] = $tier_level;

        $this->Idea->save($data);
    }


    private function _alertUser($idea, $tier_level){

        $this->log('$idea');
        $this->log($idea);

        $userHandle = new User();
        $ideaUser = $userHandle->find('first', array('conditions' =>array('User.id' => $idea['user_id'])));
        $ideaUser = $ideaUser['User'];

        
        $this->log('$ideaUser');
        $this->log($ideaUser);


        $this->_sendEmail(
                'phillip.wilt@gmail.com',
                __('accelerator', 'Congratulations! %s has reached Tier %d',$idea['name'], $tier_level),
                'Accelerator.tier_level',
                $this->theme,
                array(
                    'user' => $ideaUser,
                    'idea' => $idea,
                    'tier_level' => $tier_level
                )
        );

    }



    /**
 * Convenience method to send email
 *
 * @param string $from Sender email
 * @param string $to Receiver email
 * @param string $subject Subject
 * @param string $template Template to use
 * @param string $theme Theme to use
 * @param array  $viewVars Vars to use inside template
 * @param string $emailType user activation, reset password, used in log message when failing.
 * @return boolean True if email was sent, False otherwise.
 */
    protected function _sendEmail($to, $subject, $template, $theme = null, $viewVars = null) {
        if (is_null($theme)) {
            $theme = $this->theme;
        }
        $success = false;

        try {
            // $this->log(func_get_args()); //for debugging
            $email = new CakeEmail();
            $email->config('default');
            // $email->from($from[1], $from[0]);
            $email->to($to);
            $email->subject($subject);
            $email->template($template);
            $email->viewVars($viewVars);
            $email->theme($theme);
            $success = $email->send();
        } catch (SocketException $e) {
            $this->log(sprintf('Error sending %s notification : %s', $emailType, $e->getMessage()));
        }

        return $success;
    }


}


?>