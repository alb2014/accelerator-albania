<?php
// $user = AuthComponent::user();
// if ($user){
// 	echo __d('accelerator','Hello %s', $user['name']);
// } else{
// 	echo __d('accelerator','You are not logged in');
// }

echo $this->Form->create('Accelerator.Idea', array(
    'url' => array(
    	'plugin' => 'accelerator',
    	'controller' => 'ideas', 
    	'action' => 'add'
		)
	)
);

echo $this->Form->input('name', array('label' => __d('accelerator','Idea Title <span>*</span>')));
echo $this->Form->input('desc', array('rows' => '7', 'label' => __d('accelerator','The Grab (240 Characters) <span>*</span>')));
echo $this->Form->input('type', array('options' =>$ideaTypes,
                        array('label' => __d('accelerator','Type of Idea <span>*</span>'))));
// Needs to be added to the table structure
?> 

<span id="social_help" class="form-help inline">
    <a href="">[?]</a>
    <div>
        <?php echo __d('accelerator','Social hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
    </div>
</span> 

<?php
echo $this->Form->input('social_business', array('type' => 'checkbox', 'label' => __d('accelerator','Is this a social business?')));
$user = AuthComponent::user();
echo $this->Form->input('user_id', array('type' => 'hidden',
                                        'value' => $user['id']));

echo $this->Form->end(__d('accelerator','Pitch'));
?>