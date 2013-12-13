<div class="header-block">
    <?php echo $this->Layout->blocks('engage'); ?>
</div>

<!-- Submission Section -->
<div class="columns-7-5">
    <section class="submissions main">
        <header>
            <ul id="submission_sort" class="submission-sort">
                <li>Order by:</li>
                <li><a href=""><?php echo __('Date');?></a></li>
                <li><a href=""><?php echo __('Popularity');?></a></li>
                <!-- <li><a href=""><?php echo __('Topic');?></a></li> -->
            </ul>
            <h2>Submissions</h2>
        </header>

        <!-- Submissions -->
        <div class="fixed-height">
            <?php
                echo $this->element('submissions', array("full" => true));
            ?>
        </div>

    </section>

    <!-- The Program Section -->
    <section class="program">
        <header>
            <h2><?php echo __('The Program'); ?></h2>
        </header>

        <!-- Individual Infos -->
        <div class="fixed-height">
            <?php
                echo $this->Layout->blocks('the-program');
            ?>
        </div>

    </section>
</div>

<!-- Main Content Aside - Varies on Pages -->
<?php echo $this->element('cta_footer'); ?>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>
