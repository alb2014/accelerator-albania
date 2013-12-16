<?php echo $this->Form->create('User');?>

  <?php if ($includeIdea) { ?>
  <fieldset>
    <?php
    echo $this->Form->input('Idea.name', array('label' => __('Idea Title')));
    echo $this->Form->input('Idea.desc', array('rows' => '7', 'label' => __('The Grab (240 Characters)')));
    echo $this->Form->input('Idea.type', array('options' =>
                        array('social'=>__('Social'),
                              'tech' =>__('Tech'),
                              'scientific' => __('Scientific'),
                              'other' => __('Other'))),
                        array('label' => __('Type of Idea')));
    // Needs to be added to the table structure
    echo $this->Form->input('Idea.social_business', array('type' => 'checkbox', 'label' => __('Is this a social business?')));
    ?>
  </fieldset>
      <?php } ?>


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
        ?>
    </fieldset>
    <p><small><?php echo __d('croogo', 'By submitting this form, you are agreeing to HAPide\'s <a href="/page/terms-and-conditions" target="_blank">Terms &amp; Conditions</a>'); ?>.</small></p>
<?php echo $this->Form->end('Submit');?>