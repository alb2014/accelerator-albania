<?php $this->Nodes->set($node); ?>

<?php
    $custom_sidebar = false;
    if ($this->Layout->node('CustomFields.custom_sidebar')) {
        $custom_sidebar = true;
    }
?>

<section class="node-wrapper<?php if ($custom_sidebar) {?> static<?php } ?>">

    <div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
        <header>
            <h2><?php echo $this->Nodes->field('title'); ?></h2>
        </header>
        <div>
            <?php
                echo $this->Nodes->info();
                echo $this->Nodes->body();
                echo $this->Nodes->moreInfo();
            ?>
        </div>
    </div>

</section>


<!-- Sidebar (modules) -->

<!-- Custom depending on custom fields (for About & Yunus Pages) -->

<?php 
    if ($custom_sidebar) {
?>
    <section class="static sidebar">
        <header>
            <h2><?php echo $this->Layout->node('CustomFields.sidebar_title'); ?></h2>
        </header>
        <div class="inner">
            <?php echo $this->Layout->node('CustomFields.sidebar_content'); ?>
        </div>
    </section>
<?php
    } else {
        echo $this->element('categories');
    }
?>

<?php
    if ($this->Layout->node('CustomFields.program_structure')) {
?>
    <section class="node-wrapper static">
        <header>
            <h2><?php echo __('Program Structure'); ?>
        </header>

        <div class="inner">
            <?php echo $this->Layout->node('CustomFields.program_structure'); ?>
        </div>
    </section>

<?php } ?>


<?php
    $type = $types_for_layout[$this->Nodes->field('type')];

    if ($type['Type']['alias'] == 'blog') {
?>

    <!-- Comments -->

    <section id="comments" class="node-comments">
        <header>
            <h2><?php echo __('Comments');?></h2>
        </header>

        <div class="inner">
            <?php echo $this->element('Accelerator.disqus_comments'); ?>
        </div>
    </section>

<?php
    }
?>