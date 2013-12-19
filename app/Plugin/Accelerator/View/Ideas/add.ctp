<div class="header-block">
    <?php echo $this->Layout->blocks('submit'); ?>
</div>

<!-- Submission Section -->
<section class="submit-idea">
    <header>
        <h2><?php echo __d('accelerator','Submit Idea');?></h2>
    </header>

    <div class="inner">
        <?php
            echo $this->element('add_form');
        ?>
<!--             <fieldset>
        <legend>Idea Category:</legend>

        <input type="radio" name="category" id="category1" value="social">
        <label for="category1">Social Business</label>

        <input type="radio" name="category" id="category2" value="tech">
        <label for="category1">Tech Business</label>

        <input type="radio" name="category" id="category2" value="science">
        <label for="category1">Scientific Development</label>

        <input type="radio" name="category" id="category2" value="other">
        <label for="category1">Other</label>
    </fieldset> -->

<!--             <input type="checkbox" name="social_business" id="social_business" value="1">
    <label for="social_business">Is this a social business?</label> -->

    </div>
</section>

<!-- The Program Section -->
<!-- If no user -->

<?php if(!$this->Session->check('Auth.User')) { ?>
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
