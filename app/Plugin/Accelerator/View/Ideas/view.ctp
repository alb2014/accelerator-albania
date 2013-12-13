<div class="header-image">
    <?php echo $this->Layout->blocks('idea-intro'); ?>
</div>

<!-- Idea -->
<section class="idea">
    <header>
        <h2><?php echo __('Idea Page');?></h2>
    </header>

    <?php echo $this->element('Accelerator.votes', array("idea" => $idea)); ?>

    <div class="info">
        <h3>Idea Name</h3>
        <p><?php echo $idea['Idea']['name']; ?></p>

        <h3>Idea Description</h3>
        <p><?php echo $idea['Idea']['desc']; ?></p>

        <h3>Idea Category</h3>
        <p class="idea-type"><?php echo $idea['Idea']['type']; ?></p>

        <?php 
        
        if($isIdeaOwner):
            echo $this->Html->link('Edit my idea',
                array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button')); 
        endif
        
        ?>
    </div>

</section>

<!-- Submissions Sidebar (module) -->
<section class="submissions sidebar">
    <header>
        <h2><a href=""><?php echo __('Submissions');?></a></h2>
    </header>

    <!-- Submissions -->
    <?php
        echo $this->element('submissions', array("full" => false));
    ?>

</section>

<!-- Idea Comments -->
<section class="idea-comments" id="comments">
    <header>
        <h2><?php __('Comments'); ?></h2>
    </header>

    <div class="inner">

        <?php if($this->Session->check('Auth.User')) { 

            echo $this->element('disqus_comments'); 

        } else { 

            echo $this->Html->link(
                    __('Login to Comment'),
                    array(
                        'plugin' => 'users',
                        'controller' => 'users',
                        'action' => 'login'
                    ),
                    array('class' => 'button','id' => 'idea_login')
                );

        } ?>

    </div>

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>