<div class="votes">
    <!-- TODO: If any of the votes' user IDs are the user's IDs, show idea as already voted --> 
    <!-- /accelerator/ideas/vote/1/up -->

    <?php 

        $vote_class = 'up';
        

        if(array_key_exists('vote.value',$idea['Idea'])) {
            $vote_val = $idea['Idea']['vote.value'];
        } else {
            $vote_val = 0;
        }
            

        if($vote_val > 0) {
            $vote_class = $vote_class . ' voted';            
        }

        echo $this->Html->link($idea['Idea']['up_votes'], array(
            'plugin' => 'accelerator', 
            'controller' => 'ideas', 
            'action' => 'vote', 
            $idea['Idea']['id'], 
            'up'), 
            array('class' => $vote_class));

        $vote_class = 'down';

        if($vote_val < 0) {
            $vote_class = $vote_class . ' voted';            
        }

        echo $this->Html->link($idea['Idea']['down_votes'], array(
            'plugin' => 'accelerator', 
            'controller' => 'ideas', 
            'action' => 'vote', 
            $idea['Idea']['id'], 
            'down'), 
            array('class' => $vote_class)); ?>
</div>