<?php

$this->extend('/Common/admin_index');
			
				echo $this->Croogo->adminAction(
					__d('croogo', 'Text List of Emails'),
					array('action' => 'email_list'),
					array('button' => 'success')
				);
			
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), '/' . $this->request->url);
?>
