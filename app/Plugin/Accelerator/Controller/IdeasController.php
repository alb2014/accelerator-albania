<?php

class IdeasController extends AcceleratorAppController {
    public function index() {
        $this->set('ideas', $this->Idea->find('all'));
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

	public function edit($ideaId){

	}

	//
	//
	public function vote(){

    }
}

?>