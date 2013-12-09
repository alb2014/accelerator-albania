<?php
// $user = AuthComponent::user();
// if ($user){
// 	echo __('Hello %s', $user['name']);
// } else{
// 	echo __('You are not logged in');
// }

echo $this->Form->create('Idea');
echo $this->Form->input('name', array('label' => 'Idea Title'));
echo $this->Form->input('desc', array('rows' => '7', 'label' => 'The Grab (240 Characters)'));
echo $this->Form->radio('type', 
                        array('social'=>'Social',
                              'tech' =>'Tech',
                              'scientific' => 'Scientific',
                              'other' => 'Other'),
                        array('legend' => 'Type of Idea'));
$user = AuthComponent::user();
echo $this->Form->input('user_id', array('type' => 'hidden',
                                        'value' => $user['id']));

echo $this->Form->end('Pitch');
?>