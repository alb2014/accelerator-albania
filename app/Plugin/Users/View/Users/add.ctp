<section class="users register">
    <header>
        <h2><?php echo $title_for_layout; ?></h2>
    </header>
    <div>
        <?php
          echo $this->element('add_form');
        ?>
    </div>
</section>

<?php
    echo $this->element('hapide_description', array(), array('plugin' => 'Accelerator'));
?>
