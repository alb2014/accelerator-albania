<?php

$this->extend('/Common/admin_index');
			
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), '/' . $this->request->url);

echo $this->Html->link(
    'Export Text Email List',
    '/Users/users/email_list',
    array('class' => 'button', 'target' => '_blank')
);
?>
