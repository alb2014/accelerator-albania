<?php
// $user = AuthComponent::user();
// if ($user){
// 	echo __('Hello %s', $user['name']);
// } else{
// 	echo __('You are not logged in');
// }

echo $this->Form->create('Accelerator.Idea', array(
    'url' => array(
    	'plugin' => 'accelerator',
    	'controller' => 'ideas', 
    	'action' => 'add'
		)
	)
);

echo $this->Form->input('name', array('label' => __('Idea Title')));
echo $this->Form->input('desc', array('rows' => '7', 'label' => __('The Grab (240 Characters)')));
echo $this->Form->input('type', array('options' =>
                        array('social'=>__('Social'),
                              'tech' =>__('Tech'),
                              'scientific' => __('Scientific'),
                              'other' => __('Other'))),
                        array('label' => __('Type of Idea')));
// Needs to be added to the table structure
echo $this->Form->input('social_business', array('type' => 'checkbox', 'label' => __('Is this a social business?')));
$user = AuthComponent::user();
echo $this->Form->input('user_id', array('type' => 'hidden',
                                        'value' => $user['id']));

echo $this->Form->end(__('Pitch'));
?>