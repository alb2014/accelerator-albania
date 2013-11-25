<?php
class IdeasController extends AcceleratorAppController {
	public function index(){
		$this->set('ideas', $this->Idea->find('all'));
	}
}
?>