<div class="header-block">
    <?php echo $this->Layout->blocks('idea-intro'); ?>
</div>

<!-- Idea -->
<section class="idea">
    <header>
        <h2><?php echo __d('accelerator','Idea Page');?></h2>
    </header>

    <?php echo $this->element('Accelerator.votes', array("idea" => $idea)); ?>

    <div class="info">
        <h3><?php echo __d('accelerator','Idea Name');?></h3>
        <p><?php echo $idea['Idea']['name']; ?></p>

        <h3><?php echo __d('accelerator','Idea Description');?></h3>
        <p><?php echo $idea['Idea']['desc']; ?></p>

        <h3><?php echo __d('accelerator', 'Idea Category');?></h3>
        <p class="idea-type"><?php echo $idea['Idea']['type']; ?></p>

        <?php 
        
        if($isIdeaOwner){
            echo $this->Html->link(__d('accelerator', 'Edit my idea'),
                array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button'));
             
            if($idea['tier_level'] > 0): 

                echo $this->Html->link(
                __d('accelerator', 'Submit to Jury'),
                array(
                    'full_base' => true,
                    'module' => 'accelerator',
                    'action' => 'submitIdea',
                    $idea['id']
                    
                ),
                    array('class' => 'button')
                );

            endif;

        }
        if($isAdmin){
            echo $this->Html->link(__d('accelerator', 'Edit this idea'),
                array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button')); 
            echo $this->Html->link(__d('accelerator', 'Delete this idea'),
                array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'delete', $idea['Idea']['id']), array('class' => 'button')); 
       }
        ?>
    </div>

</section>

<!-- Submissions Sidebar (module) -->
<section class="submissions sidebar">
    <header>
        <h2><a href=""><?php echo __d('accelerator','Submissions');?></a></h2>
    </header>

    <!-- Submissions -->
    <?php
        echo $this->element('submissions', array("full" => false));
    ?>

</section>

<!-- Idea Comments -->
<section class="idea-comments" id="comments">
    <header>
        <h2><?php echo __d('accelerator','Comments'); ?></h2>
    </header>

    <div class="inner">

        <?php 

        if($this->Session->check('Auth.User')) { 


            $user = AuthComponent::user();

            $disqus_sso = $this->Disqus->single_sign_on($user);
            $disqus_pubkey = $this->Disqus->get_public_key();

            echo $this->element('disqus_comments', array(
                'disqus_sso' => $disqus_sso,
                'disqus_pubkey' => $disqus_pubkey
                )
            ); 

        } else { 

            echo $this->Html->link(
                    __d('accelerator','Login to Comment'),
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

<?php $this->start('facebook_meta'); ?>
    <meta property="og:title" content="<?php echo $idea['Idea']['name']; ?>">
    <meta property="og:url" content="<?php echo Router::url( $this->here, true ); ?>">
    <meta property="og:description" content="<?php echo $idea['Idea']['desc']; ?>">
<?php $this->end(); ?>