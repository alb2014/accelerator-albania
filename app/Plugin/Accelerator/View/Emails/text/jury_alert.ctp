<?php 

echo __d('accelerator', "Congratulations %s!\n", $user['name']); 
echo __d('accelerator', 'A new idea, %s, has been submitted for review by %s',$idea['name'], $user['name']),

$url = "http://hapide.com/accelerator/ideas/view/" . $idea['id'];
?>