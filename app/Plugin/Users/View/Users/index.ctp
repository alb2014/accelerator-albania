<section class="users profile">
    <header>
        <!-- <h2><?php echo $title_for_layout; ?></h2> -->
        <h2>New Idea?</h2>
    </header>

    <div class="inner">
        <!-- <p><?php echo __d('croogo', 'Hello, ') . ' ' . $this->Session->read('Auth.User.name'); ?>.</p> -->

        <?php
            echo $this->element('add_form', array(), array('plugin' => 'Accelerator'));
        ?>
    </div>
</section>

<section class="users edit">
    <header>
        <!-- <h2><?php echo $title_for_layout; ?></h2> -->
        <h2>Edit My Account</h2>
    </header>

    <div class="inner">
                <?php 
                    echo $this->Html->link(
                        'Logout', 
                        array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'), 
                        array('class' => 'button')
                    ); 
                ?>
                <?php 
                    echo $this->Html->link(
                        'Delete Account', 
                        array('plugin' => 'users', 'controller' => 'users', 'action' => 'delete'), 
                        array('class' => 'button')
                    ); 
                ?>
    </div>
</section>

<section class="submissions sidebar">
    <header>
        <h2>My Past Submissions</h2>
    </header>

    <!-- List of Submissions -->
    <?php
        echo $this->element('submissions', array(), array('plugin' => 'Accelerator'));
    ?>

</section>