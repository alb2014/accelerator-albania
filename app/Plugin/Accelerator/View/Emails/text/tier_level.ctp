<?php 

echo __d('accelerator', "Congratulations %s!\n", $user['name']); 
echo __d('accelerator', "Your idea %s has reached Tier %d \n",$idea['name'], $tier_level);

$url = Router::url(array(
		'plugin' => 'accelerator',
		'controller' => 'ideas',
		'action' => 'view',
		$idea['id']
	), true);

	echo __d('accelerator', "Take a look at your idea's progress %s \n", $url);
?>