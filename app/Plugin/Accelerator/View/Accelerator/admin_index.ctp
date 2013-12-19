<?php $this->extend('/Common/admin_index'); ?>

<?php $this->start('tabs'); ?>
<li><?php echo $this->Html->link(__d('accelerator','New Tab'), array('action' => 'add')); ?></li>
<?php $this->end(); ?>

<p><?php echo __d('accelerator','content here'); ?></p>