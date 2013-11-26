<h1>Pitch Your Idea</h1>
<?php
echo $this->Form->create('Idea');
echo $this->Form->input('name');
echo $this->Form->input('desc', array('rows' => '3'));
echo $this->Form->input('type', array('options'=> array('social'=>'Social',
														'tech' =>'Tech',
														'scientific' => 'Scientfic',
														'other' => 'Other')));
echo $this->Form->input('user_id', array('type' => 'hidden',
										'value' => AuthComponent::user()['id']));

echo $this->Form->end('Pitch');
?>