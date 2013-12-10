<?php echo $this->Form->create('User');?>
    <fieldset>
        <?php
          echo $this->Form->input('username');
          echo $this->Form->input('password', array('value' => ''));
          echo $this->Form->input('verify_password', array('type' => 'password', 'value' => ''));
        ?>
    </fieldset>
    <fieldset>
        <?php
          echo $this->Form->input('name');
          echo $this->Form->input('email');
          echo $this->Form->input('website');
        ?>
    </fieldset>
    <p><small><?php echo __('By submitting this form, you are agreeing to HAPide\'s <a href="/page/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>'); ?>.</small></p>
<?php echo $this->Form->end('Submit');?>