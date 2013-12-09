<?php
App::uses('Vote', 'Accelerator.Model');
class IdeasController extends AcceleratorAppController {
        public $components = array('Paginator');


    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Idea.total_votes' => 'asc'
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
        $votes = new Vote();
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
            if ($this->Idea->save($this->request->data)) {
                $this->Idea->setFlash(__('Your idea has been saved.'));
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
        $this->set('idea', $idea);
        $this->set('ideas', ClassRegistry::init('Idea')->find('all'));
    }

    public function edit($id = null) {
        $user = AuthComponent::user();
        if (!$id) {
            throw new NotFoundException(__("We couldn't find that idea."));
        }

        $idea = $this->Idea->findById($id);
        if (!$idea) {
            throw new NotFoundException(__("We couldn't find that idea."));
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
        
        $this->set('ideas', ClassRegistry::init('Idea')->find('all'));
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
        $this->log($data);
        if ($vote->save($data)) {
            $this->Session->setFlash(__('Vote cast!'));
            $this->updateVotes($ideaId);
            return $this->redirect(array('action' => 'index/'));
        }
        $this->Session->setFlash(__('Voting failed.'));
        return $this->redirect(array('action' => 'index/'));
    }

    private function updateVotes($ideaId){
        $this->Idea->id = $ideaId;
        $voteHandle = new Vote();
        $myVotes = $voteHandle->find('all', array('conditions' =>array('Vote.idea_id' => $ideaId)));
        $upvotes = 0;
        $downvotes = 0;
        //$this->log($myVotes);
        foreach  ($myVotes as $vote){
            if ($vote['Vote']['value'] > 0){
                $upvotes++;
            }  
            if ($vote['Vote']['value'] < 0){
                $downvotes++;
            }
        }
        $data['Idea']['up_votes'] = $upvotes;
        $data['Idea']['down_votes'] = $downvotes;
        $data['Idea']['total_votes'] = $upvotes - $downvotes;
        $this->Idea->save($data);
    }


}


?>