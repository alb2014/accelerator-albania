<?php echo $this->Form->create('User');?>

  <?php if ($includeIdea) { ?>
  <fieldset class="idea-submit">
    <?php
    echo $this->Form->input('Idea.name', array('label' => __d('accelerator','Idea Title')));
    echo $this->Form->input('Idea.desc', array('rows' => '7', 'label' => __d('accelerator','The Grab (240 Characters)')));
    echo $this->Form->input('Idea.type', array('options' =>$ideaTypes,
                        array('label' => __d('accelerator','Type of Idea'))));
    echo $this->Form->input('Idea.social_business', array('type' => 'checkbox', 'label' => __d('accelerator','Is this a social business?')));
    ?>
  </fieldset>
      <?php } ?>


    <fieldset>
        <?php
          echo $this->Form->input('username', array('label' => __d('accelerator', 'Username <span>*</span>')));
          echo $this->Form->input('password', array('value' => '',
                                                    'label' => __d('accelerator', 'Password <span>*</span>')));
          echo $this->Form->input('verify_password', array('type' => 'password', 'value' => '', 'label' => __d('accelerator', 'Verify Password <span>*</span>')));
        ?>
    </fieldset>
    <fieldset>
        <?php
          echo $this->Form->input('name', array('label' => __d('accelerator', 'Name <span>*</span>')));
          echo $this->Form->input('email', array('label' => __d('accelerator', 'Email <span>*</span>')));
        ?>
    </fieldset>
    <p><small><?php echo __d('accelerator', 'By submitting this form, you are agreeing to HAPide\'s <a href="/page/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>'); ?>.</small></p>
    <p><small><?php echo __d('accelerator', '* Required Field'); ?></small></p>
<?php echo $this->Form->end(__d('accelerator', 'Submit'));?>