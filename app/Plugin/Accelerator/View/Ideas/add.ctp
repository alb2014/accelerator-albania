<div class="header-block">
    <?php echo $this->Layout->blocks('submit'); ?>
</div>

<!-- Submission Section -->
<section class="submit-idea">
    <header>
        <h2><?php echo __d('accelerator','Submit Idea');?></h2>
    </header>

    <div class="inner">
        <?php echo $this->element('add_form');?>
    </div>
</section>

<!-- The Program Section -->
<?php if(!$this->Session->check('Auth.User')) { ?>
    <!-- If no user -->
    <section class="create-profile">
        <header>
            <h2><?php echo __d('accelerator','Create Profile');?></h2>
        </header>

        <?php
            echo $this->element('add_form', array(), array('plugin' => 'Users'));
        ?>

    </section>
<?php } ?>

<aside class="miscellaneous">
    <?php echo $this->Layout->blocks('submit-footer'); ?>
</aside>


<?php
    $this->start('footer_bar');
        echo $this->element('organization_info');
        echo $this->element('mentors');
    $this->end();
?>
