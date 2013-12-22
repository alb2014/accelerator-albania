<div class="users form">
  <header>
  	<h2><?php echo $title_for_layout; ?></h2>
  </header>
  <div class="inner">
  	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'reset', $username, $key)));?>
  		<fieldset>
  		<?php
  			echo $this->Form->input('password', array('label' => __d('accelerator', 'New password')));
  			echo $this->Form->input('verify_password', array('type' => 'password', 'label' => __d('accelerator', 'Verify Password')));
  		?>
  		</fieldset>
  	<?php echo $this->Form->end(__d('accelerator', 'Submit'));?>
  </div>
</div>