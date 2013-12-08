<section class="users login">
    <header>
        <h2><?php echo __d('croogo', 'Login'); ?></h2>
    </header>

    <div>
        <?php
            echo $this->element('login_form');
        ?>
    </div>

</section>

<?php
    $this->start('footer_bar');
    echo $this->element('organization_info', array(), array('plugin' => 'Accelerator'));
    echo $this->element('mentors', array(), array('plugin' => 'Accelerator'));
    $this->end();
?>