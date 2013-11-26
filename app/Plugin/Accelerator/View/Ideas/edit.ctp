<h1>Modify Your Idea</h1>
<?php
$modelOpts = array('notforprofit'=>'Not For Profit',
														'nonprofit' =>'Nonprofit',
														'enterpriseb2b' => 'Enterprise/B2B',
														'b2c' => 'B2C',
														'subscription' => 'Subscription',
														'freemium' => 'Freemium',
														'retail' => 'Retail',
														'ecommerce' => 'ecommerce',
														'community' => 'Community',
														'advocacy' => 'Advocacy',
														'other' => 'Other'
														);
$typeOpts =  array('social'=>'Social',
														'tech' =>'Tech',
														'scientific' => 'Scientfic',
														'other' => 'Other');

echo $this->Form->create('Idea');
echo $this->Form->input('title');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('type', array('options'=> $typeOpts));
$user = AuthComponent::user();
echo $this->Form->input('user_id', array('type' => 'hidden',
										'value' => $user['id']));
echo $this->Form->input('problem', array('rows' => '3',
										));
echo $this->Form->input('solution', array('rows' => '3'));
echo $this->Form->input('market', array('rows' => '3'));
echo $this->Form->input('competition', array('rows' => '3'));
echo $this->Form->input('model', array('options'=> $modelOpts));
echo $this->Form->input('promise', array('rows' => '3'));

echo $this->Form->end('Pitch');
?>