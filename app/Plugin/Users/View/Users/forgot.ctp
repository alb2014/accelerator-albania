<section class="users form">
  <header>
  	<h2><?php echo $title_for_layout; ?></h2>
  </header>
  <div class="inner">
  	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forgot')));?>
  		<fieldset>
  		<?php
  			echo $this->Form->input('username');
  		?>
  		</fieldset>
  	<?php echo $this->Form->end('Submit');?>
  </div>
</section>