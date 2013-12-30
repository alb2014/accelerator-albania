<?php 

echo __d('accelerator', "Congratulations %s!\n", $user['name']); 
echo __d('accelerator', "Your idea %s has reached Tier %d \n",$idea['name'], $tier_level);

// $url = Router::url(array(
// 		'plugin' => 'accelerator',
// 		'controller' => 'ideas',
// 		'action' => 'edit',
// 		$idea['id']
// 	), true);

$url = "http://hapide.com/accelerator/ideas/edit/" . $idea['id'];

	echo __d('accelerator', "You have new information to enter to your idea %s \n", $url);
?>