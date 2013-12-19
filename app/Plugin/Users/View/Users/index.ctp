<section class="users profile">
    <header>
        <!-- <h2><?php echo $title_for_layout; ?></h2> -->
        <h2><?php echo __d('accelerator', 'New Idea?');?></h2>
    </header>

    <div class="inner">
        <?php
            echo $this->element('Accelerator.add_form');
        ?>
    </div>
</section>

<section class="submissions sidebar">
    <header>
        <h2><?php echo __d('accelerator', 'My Past Submissions');?></h2>
    </header>

    <!-- List of Submissions -->
    <?php
        echo $this->element('Accelerator.submissions', array('full' => false));
    ?>

</section>

<section class="users edit">
    <header>
        <!-- <h2><?php echo $title_for_layout; ?></h2> -->
        <h2><?php echo __d('accelerator', 'Edit My Account');?></h2>
    </header>

    <div class="inner">
                <?php 
                    echo $this->Html->link(
                        __d('accelerator', 'Logout'), 
                        array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'), 
                        array('class' => 'button')
                    ); 
                ?>
                <?php 
                    echo $this->Html->link(
                        __d('accelerator', 'Delete Account'), 
                        array('plugin' => 'users', 'controller' => 'users', 'action' => 'delete'), 
                        array('class' => 'button')
                    ); 
                ?>
    </div>
</section>