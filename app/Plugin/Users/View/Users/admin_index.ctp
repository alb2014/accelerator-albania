<?php
$actionBlock =  $this->Croogo->adminAction(
					__d('croogo', 'New %s', __d('croogo', Inflector::singularize($this->name))),
					array('action' => 'add'),
					array('button' => 'success'));

$actionBlock .= $this->Html->link(
    'Export Text Email List',
    '/users/users/email_list',
    array('class' => 'button', 'target' => '_blank')
);
$this->extend('/Common/admin_index');
$this->assign('actions', $actionBlock);			
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), '/' . $this->request->url);


?>
