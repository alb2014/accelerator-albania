<?php echo $this->Form->create('User');?>

  <?php if ($includeIdea) { ?>
  <fieldset>
    <?php
    echo $this->Form->input('Idea.name', array('label' => __d('accelerator','Idea Title')));
    echo $this->Form->input('Idea.desc', array('rows' => '7', 'label' => __d('accelerator','The Grab (240 Characters)')));
    echo $this->Form->input('Idea.type', array('options' =>$ideaTypes,
                        array('label' => __d('accelerator','Type of Idea'))));
    // Needs to be added to the table structure
    echo $this->Form->input('Idea.social_business', array('type' => 'checkbox', 'label' => __d('accelerator','Is this a social business?')));
    ?>
  </fieldset>
      <?php } ?>


    <fieldset>
        <?php
          echo $this->Form->input('username', array('label' => __d('accelerator', 'Username')));
          echo $this->Form->input('password', array('value' => '',
                                                    'label' => __d('accelerator', 'Password')));
          echo $this->Form->input('verify_password', array('type' => 'password', 'value' => '', 'label' => __d('accelerator', 'Verify Password')));
        ?>
    </fieldset>
    <fieldset>
        <?php
          echo $this->Form->input('name', array('label' => __d('accelerator', 'Name')));
          echo $this->Form->input('email', array('label' => __d('accelerator', 'Email')));
        ?>
    </fieldset>
    <p><small><?php echo __d('croogo', 'By submitting this form, you are agreeing to HAPide\'s <a href="/page/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>'); ?>.</small></p>
<?php echo $this->Form->end(__d('accelerator', 'Submit'));?>