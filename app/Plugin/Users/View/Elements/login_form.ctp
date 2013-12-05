<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
    <fieldset>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end('Submit');?>
<p>
    <?php echo $this->Html->link('Register', array('plugin' => 'users', 'controller' => 'users', 'action' => 'add')); ?>
</p>