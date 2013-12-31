<?php echo $this->Form->create('User');?>

  <?php if ($includeIdea) { ?>
  <fieldset class="idea-submit">
    <?php
    echo $this->Form->input('Idea.name', array('label' => __d('accelerator','Idea Title <span>*</span>')));
    echo $this->Form->input('Idea.desc', array('rows' => '7', 'label' => __d('accelerator','The Grab (240 Characters) <span>*</span>')));
    echo $this->Form->input('Idea.type', array(
          'options' =>array(
              'Agriculture' => __d('accelerator','Agriculture'),
             'CommunicationsAndMedia' => __d('accelerator', 'Communications and Media'),
             'EducationAndTraining' => __d('accelerator', 'Education and Training'),
             'Energy' => __d('accelerator', 'Energy'),
             'Environment' => __d('accelerator', 'Environment'),
             'FashionAndLifestyle' => __d('accelerator', 'Fashion and Lifestyle'),
             'Health' => __d('accelerator', 'Health'),
             'Tourism' => __d('accelerator', 'Tourism'),
             'MobilityAndTransport' => __d('accelerator', 'Mobility and Transport'),
             'HousingAndConstruction' => __d('accelerator', 'Housing and Construction'),
             'FinancialServices' => __d('accelerator', 'Financial Services'),
             'Technology' => __d('accelerator', 'Technology'),
             'Gastronomy' => __d('accelerator', 'Gastronomy'),
             'PersonalCareAndServices' => __d('accelerator', 'Personal Care and Services'),
             'Entertainment' => __d('accelerator', 'Entertainment'),
             'Other' => __d('accelerator', 'Other')
           ),
          'label' => __d('accelerator','Type of Idea <span>*</span>'
            )
          )
    );
    echo $this->Form->input('Idea.social_business', array('type' => 'checkbox', 'label' => __d('accelerator','Is this a social business? <span>*</span>')));
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