<div class="votes">
    <!-- TODO: If any of the votes' user IDs are the user's IDs, show idea as already voted --> 
    <!-- /accelerator/ideas/vote/1/up -->
    <?php echo $this->Html->link('34', array('plugin' => 'accelerator', 
                                             'controller' => 'ideas', 
                                             'action' => 'vote', 
                                             $idea['Idea']['id'], 
                                             'up'), 
                                  array('class' => 'up')); ?>

    <?php echo $this->Html->link('8', array('plugin' => 'accelerator', 
                                             'controller' => 'ideas', 
                                             'action' => 'vote', 
                                             $idea['Idea']['id'], 
                                             'down'), 
                                  array('class' => 'down')); ?>
</div>