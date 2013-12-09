<section class="users login">
    <header>
        <h2><?php echo __d('croogo', 'Login'); ?></h2>
    </header>

    <div>
        <?php
            echo $this->element('login_form');
            echo $this->Facebook->login();
            echo $this->Facebook->registration();
        ?>
    </div>

</section>

<?php
    $this->start('footer_bar');
    echo $this->element('Accelerator.organization_info');
    echo $this->element('Accelerator.mentors');
    $this->end();
?>