<?php 

echo __('accelerator', "Congratulations %s!\n", $user['name']); 
echo __('accelerator', "Your idea %s has reached Tier %d \n",$idea['name'], $tier_level);

$url = Router::url(array(
		'plugin' => 'accelerator',
		'controller' => 'ideas',
		'action' => 'edit',
		$idea['id']
	), true);

	echo __('accelerator', "You have new information to enter to your idea %s \n", $url);
?>