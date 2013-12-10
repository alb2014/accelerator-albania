<div class="slideshow">

    <ul class="slides">
        <li>
            <?php echo $this->Html->link($this->Html->image('homepage.jpg'),
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add'), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link($this->Html->image('homepage2.jpg'),
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index'), array('escape' => false)); ?></li>
        <li><a href="/blog"><?php echo $this->Html->image('homepage3.jpg'); ?></a></li>
    </ul>

    <ul class="toggles">
        <li>Submit</li>
        <li>Engage</li>
        <li>Learn</li>
    </ul>

</div>

<p><?php echo $this->Layout->blocks('introduction'); ?></p>                

<!-- Column Section -->
<div class="columns-7-5">

    <!-- News Section -->
    <section class="news">
        <header>
            <p class="read-more">
                <a href="/blog">read more</a>
            </p>
            <h2><a href="/blog">News</a></h2>
        </header>

        <!-- Individual News Items -->
        <?php echo $this->element('nodes', array("nodes" => $nodes)); ?>

    </section>

    <section class="submissions sidebar">
        <header>
            <p class="read-more">
            <?php 
                echo $this->Html->link(
                    'read more', 
                    array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')
                ); 
            ?>
            </p>
            <h2>
                <?php 
                echo $this->Html->link(
                    'Submissions', 
                    array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')
                ); 
            ?>
            </h2>
        </header>

        <!-- List of Submissions -->
        <?php
            echo $this->element('submissions', array("full" => false));
        ?>

    </section>

</div>

<!-- Main Content Aside - Varies on Pages -->
<?php echo $this->element('cta_footer'); ?>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>