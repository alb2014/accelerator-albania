<section class="users form">
  <header>
  	<h2><?php echo $title_for_layout; ?></h2>
  </header>
  <div class="inner">
  	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot')));?>
  		<fieldset>
  		<?php
  			echo $this->Form->input('username', array('label' => __d('accelerator', 'Username')));
  		?>
  		</fieldset>
  	<?php echo $this->Form->end(__d('accelerator', 'Submit'));?>
  </div>
</section>