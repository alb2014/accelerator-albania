<?php

class IdeasController extends AcceleratorAppController {

    function beforeFilter() {
        parent::beforeFilter();
        $this->set('ideas', $this->Idea->find('all'));
    }

    public function index() {

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

    public function edit($ideaId){

    }

	//
	//
	public function vote(){

    }
}

?>