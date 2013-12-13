<div class="header-block">
    <?php echo $this->Layout->blocks('learn'); ?>
</div>

<section class="nodes">
    <header>
        <div class="paging"><?php echo $this->Paginator->numbers(); ?></div>
        <h2><?php echo __d('croogo', 'Learn');?></h2>
    </header>
    <?php
        if (count($nodes) == 0) {
            echo __d('croogo', 'No items found.');
        }
    ?>

    <?php
        foreach ($nodes as $node):
            $this->Nodes->set($node);
    ?>
    <div id="node-<?php echo $this->Nodes->field('id'); ?>" class="node node-type-<?php echo $this->Nodes->field('type'); ?>">
        <h2><?php echo $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url')); ?></h2>
        <?php
            echo $this->Nodes->info();
            echo $this->Nodes->body();
            echo $this->Nodes->moreInfo();
        ?>
    </div>
    <?php
        endforeach;
    ?>
</section>

<?php echo $this->element('categories'); ?>

<?php
    // echo $layout->node('CustomFields.sidebar_content');
?>

<aside class="miscellaneous">
    <?php echo $this->Layout->blocks('blog-index-footer'); ?>
</aside>
