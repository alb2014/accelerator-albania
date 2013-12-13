<div class="header-block">
    <?php echo $this->Layout->blocks('engage'); ?>
</div>

<!-- Submission Section -->
<div class="columns-7-5">
    <section class="submissions main">
        <header>
            <ul id="submission_sort" class="submission-sort">
                <li>Order by:</li>
                <li>
                    <?php echo $this->Paginator->sort('date_created', 'Date', array('direction' => 'desc')); ?>
                </li>
                <li>
                    <?php echo $this->Paginator->sort('total_votes', 'Popularity', array('direction' => 'desc')); ?>
                </li>
                <!-- <li><a href=""><?php echo __('Topic');?></a></li> -->
            </ul>
            <h2>Submissions</h2>
        </header>

        <!-- Submissions -->
        <?php
            echo $this->element('submissions', array("full" => true));
        ?>

        <div class="pagination">
            <?php

                echo $this->Paginator->prev(
                    ' << ' . __('Previous'),
                    array(),
                    null,
                    array('class' => 'prev disabled')
                );

                echo $this->Paginator->next(
                    __('Next') . ' >> ',
                    array(),
                    null,
                    array('class' => 'next disabled')
                );

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
