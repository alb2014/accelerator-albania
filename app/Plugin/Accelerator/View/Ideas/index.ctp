<div class="header-block">
    <?php echo $this->Layout->blocks('engage'); ?>
</div>

<!-- Submission Section -->
<div class="columns-7-5">
    <section class="submissions main">
        <header>
            <ul id="submission_sort" class="submission-sort">
                <li><?php echo __d('accelerator', 'Order by:');?></li>
                <li>
                    <?php echo $this->Paginator->sort('date_created', __d('accelerator', 'Date'), array('direction' => 'desc')); ?>
                </li>
                <li>
                    <?php echo $this->Paginator->sort('total_votes', __d('accelerator', 'Popularity'), array('direction' => 'desc', 'class' => 'popularity')); ?>
                </li>
                <!-- <li><a href=""><?php echo __d('accelerator','Topic');?></a></li> -->
            </ul>
            <h2><?php echo __d('accelerator','Submissions'); ?></h2>
        </header>

        <!-- Submissions -->
        <?php
            echo $this->element('submissions', array("full" => true));
        ?>

        <div class="pagination">
            <?php

                echo $this->Paginator->prev(
                    ' << ' . __d('accelerator','Previous'),
                    array(),
                    null,
                    array('class' => 'prev disabled')
                );

                echo $this->Paginator->next(
                    __d('accelerator', 'Next') . ' >> ',
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
            <h2><?php echo __d('accelerator','The Program'); ?></h2>
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
