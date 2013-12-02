<?php

class IdeasController extends AcceleratorAppController {

    public function index($userId=false) {
        $conditions = array();
        if ($userId){
            $conditions['Idea.userId'] = $userId;
        }
        $this->set('ideas', $this->Idea->find('all', array('conditions' => $conditions)));
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
        if ($idea['userID'] == AuthComponent::user()['id']){
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
    }

    public function edit($id = null) {
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
                return $this->redirect(array('action' => 'index/'.AuthComponent::user()['id']));
            }
            $this->Session->setFlash(__('Unable to update your idea.'));
        }

        if (!$this->request->data) {
            $this->request->data = $idea;
        }
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
        $vote=>id = $ideaId.'-'AuthCompenent::user()['id'];

    }

        //modify vote in the table

        //Update the idea


    }
}

?>