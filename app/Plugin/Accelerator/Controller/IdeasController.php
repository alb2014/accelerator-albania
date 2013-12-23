<?php
App::uses('Vote', 'Accelerator.Model');
App::uses('User', 'Users.Model');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeEvent', 'Event');


class IdeasController extends AcceleratorAppController {
    
    public $components = array('Paginator');

    public $helpers = array('Disqus');


    public $paginate = array(
        'limit' => 7,
        'order' => array(
            'Idea.date_created' => 'desc',
            'Idea.total_votes' => 'desc',
            'Idea.up_votes' => 'desc'
        )
    );

    public function stats(){
        $votes = ClassRegistry::init('Vote');
        $upvotes = count($votes->find('all', array('conditions' =>array('Vote.value' => 1))));
        $total_ideas = count($this->Idea->find('all'));
        $tier_one_ideas = count($this->Idea->find('all', array('conditions' =>array('Idea.tier_level' => 1))));
        $tier_two_ideas = count($this->Idea->find('all', array('conditions' =>array('Idea.tier_level' => 2))));
        $unsubmitted = count($this->Idea->find('all', array('conditions' =>array('Idea.tier_level' => 2,
                                                                                'submitted' => 0
                                                                          ))));
        $this->set('total_ideas', $total_ideas);
        $this->set('tier_one_ideas', $tier_one_ideas);
        $this->set('tier_two_ideas', $tier_two_ideas);
        $this->set('unsubmitted', $unsubmitted);
        $this->set('total_upvotes', $upvotes);;
    }


    public function index($userId=false) {
        $user = AuthComponent::user();
        $this->Paginator->settings = $this->paginate;
        $conditions = array();
        if ($userId){
            $this->Paginator->settings['conditions']['Idea.user_id'] = $userId;
        }
        $ideas = $this->Paginator->paginate('Idea');
        $votes = ClassRegistry::init('Vote');
        if ($user){
            $user_votes = $votes->find('all', array('conditions' =>array('Vote.user_id' => $user['id'])));
        } else {
            $user_votes = $votes->find('all', array('conditions' =>array('Vote.ip_address' => $this->request->clientIp())));
        }
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
        $this->set('ideas', $ideas);
        $this->set('faq_node', ClassRegistry::init('Node')->findBySlug('faq'));
    }
	    
    public function add() {
        $this->set('ideaTypes', $this->Idea->getIdeaTypes());
        if (AuthComponent::user()){
            if ($this->request->is('post')) {
                $this->Idea->create();
                $this->request->data['Idea']['date_created'] = null;
                if ($this->Idea->save($this->request->data)) {
                    $this->Session->setFlash(__d('accelerator','Your idea has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__d('accelerator','Unable to add your idea.'));
            }
        } else {
            $this->redirect('/users/users/add/1');
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $idea = $this->Idea->findById($id);
        $user = AuthComponent::user();
        if (($idea['userID'] == $user['id']) or ($user['role'] == 1)){
            if ($this->Idea->delete($id)) {
                $this->Session->setFlash(__d('accelerator','The idea with id: %s has been deleted.', h($id)));
                return $this->redirect(array('action' => 'index'));
            }
        } else {

            $this->Session->setFlash(__d('accelerator','You are not authorized to delete this idea.'));
            return $this->redirect(array(
                    'action' => 'view',
                    $id
                ));
        }
    }

    public function view($ideaId = null){
        
        if (!$ideaId) {
            throw new NotFoundException(__d('accelerator','Invalid idea'));
        }

        $idea = $this->Idea->findById($ideaId);

        if (!$idea) {
            throw new NotFoundException(__d('accelerator','Invalid idea'));
        }

        $user = AuthComponent::user();

        $isIdeaOwner = false;
        $isAdmin = false;
        if($user['id'] == $idea['Idea']['user_id']) {
            $isIdeaOwner = true;
        }

        if($user['role_id'] == 1) {
            $isAdmin = true;
        }

        $this->set('isIdeaOwner', $isIdeaOwner);
        $this->set('isAdmin', $isAdmin);
        $votes = ClassRegistry::init('Vote');
        if ($user){
            $user_votes = $votes->find('all', array('conditions' =>array('Vote.user_id' => $user['id'])));
        } else {
            $user_votes = $votes->find('all', array('conditions' =>array('Vote.ip_address' => $this->request->clientIp())));
        }
        foreach ($user_votes as $vote){
            if ($idea['Idea']['id'] == $vote['Vote']['idea_id']){         
                    $idea['Idea']['vote.value'] = $vote['Vote']['value'];
                }
         }
         if (!isset($idea['Idea']['vote.value'])){
               $idea['Idea']['vote.value'] = 0;
         }
            

        $this->set('idea', $idea);
        $ideas =  ClassRegistry::init('Idea')->find('all', array(
            'limit' => 4,
            'order' => array(
                'Idea.date_created' => 'desc',
                'Idea.total_votes' => 'desc',
                'Idea.up_votes' => 'desc') 
            )
        );

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

        $this->set('ideas',$ideas);
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__d('accelerator',"We couldn't find that idea."));
        }

        $idea = $this->Idea->findById($id);

        if (!$idea) {
            throw new NotFoundException(__d('accelerator',"We couldn't find that idea."));
        }
        $this->set('ideaTypes', $this->Idea->getIdeaTypes());
        //check to see if user is the idea owner
        $user = AuthComponent::user();
        
        if($user['id'] != $idea['Idea']['user_id'] and $user['role_id'] != 1){
            $this->Session->setFlash(__d('accelerator','You are not authorized to edit this idea.'));
            return $this->redirect(array(
                    'action' => 'view',
                    $id
                ));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Idea->id = $id;
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash(__d('accelerator','Your idea has been updated.'));
                return $this->redirect(array('action' => 'view/'.$user['id']));
            }
            $this->Session->setFlash(__d('accelerator','Unable to update your idea.'));
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
        if ($user){
            $id = $ideaId.'-'.$user['id'];
            $userId = $user['id'];
            $ipAddress = null;
        } else {
            $id = $ideaId.'-'.RequestHandlerComponent::getClientIp();
            $user['id'] = null;
            $ipAddress = RequestHandlerComponent::getClientIp();
        }
        $data = array('Vote' => array('id' => $id,
                                      'value' => $mod,
                                      'idea_id' => $ideaId,
                                      'user_id' => $userId,
                                      'ip_address' => $ipAddress));
        
        $vote->id = $ideaId.'-'.$user['id'];

        if ($vote->save($data)) {
            $this->Session->setFlash(__d('accelerator','Vote cast!'));
            $this->updateVotes($ideaId);
            return $this->redirect(array('action' => 'index/'));
        }

        $this->Session->setFlash(__d('accelerator','Voting failed.'));
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

        if($tier_level == 0 && $upvotes >= $tier_2_votes_req) {
            $tier_level = 1;
            $this->_alertUser($idea, $tier_level);
        } else if($tier_level == 1 && $upvotes >= $tier_3_votes_req) {
            $tier_level = 2;
            $this->_alertUser($idea, $tier_level);
        }

        // End leveling up logic

        $data['Idea']['up_votes'] = $upvotes;
        $data['Idea']['down_votes'] = $downvotes;
        $data['Idea']['total_votes'] = $total_votes;
        $data['Idea']['tier_level'] = $tier_level;

        $this->Idea->save($data);
    }

    private function _alertUser($idea, $tier_level){

        $event = new CakeEvent('Accelerator.Idea.Tier_Level_Up', $this, array(
            'idea' => $idea,
            'tier_level' => $tier_level
        ));
        
        $this->getEventManager()->dispatch($event);
        
    }

}


?>