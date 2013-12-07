<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
    <fieldset>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end('Submit');?>
<ul>
    <li>
        <?php 
            echo $this->Html->link('Register', array('plugin' => 'users', 'controller' => 'users', 'action' => 'add')); 
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('Forgot your password?', array('plugin' => 'users', 'controller' => 'users', 'action' => 'forgot')); 
        ?>
    </li>
</ul>