<?php
$user = AuthComponent::user();
if ($user){
	echo __('Hello %s', $user['name']);
} else{
	echo __('You are not logged in');
}

echo $this->Form->create('Idea');
echo $this->Form->input('name');
echo $this->Form->input('desc', array('rows' => '6'));
echo $this->Form->input('type', array('options'=> array('social'=>'Social',
                                                        'tech' =>'Tech',
                                                        'scientific' => 'Scientfic',
                                                        'other' => 'Other')));
$user = AuthComponent::user();
echo $this->Form->input('user_id', array('type' => 'hidden',
                                        'value' => $user['id']));

echo $this->Form->end('Pitch');
?>