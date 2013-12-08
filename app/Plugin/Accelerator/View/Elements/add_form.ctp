<?php
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