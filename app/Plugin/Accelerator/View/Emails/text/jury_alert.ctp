<?php 

echo __d('accelerator', 'A new idea, %s, has been submitted for review by %s. ',$idea['Idea']['name'], $user['username']);

$url = "http://hapide.com/accelerator/ideas/view/" . $idea['Idea']['id'];

echo $url;

?>