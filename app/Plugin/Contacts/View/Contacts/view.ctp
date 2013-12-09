<?php
    echo $this->Html->image('homepage2.jpg');
?>
<p><?php echo $this->Layout->blocks('contact'); ?></p>

<section id="contact-<?php echo $contact['Contact']['id']; ?>" class="contact-wrapper">
    <header>
        <h2><?php echo $contact['Contact']['title']; ?></h2>
    </header>
    <div class="contact-body">
    <?php echo $contact['Contact']['body']; ?>
    </div>

    <?php if ($contact['Contact']['message_status']): ?>
    <div class="contact-form inner">
    <?php
        echo $this->Form->create('Message', array(
            'url' => array(
                'plugin' => 'contacts',
                'controller' => 'contacts',
                'action' => 'view',
                $contact['Contact']['alias'],
            ),
        ));
        echo $this->Form->input('Message.name', array('label' => __d('croogo', 'Your name')));
        echo $this->Form->input('Message.email', array('label' => __d('croogo', 'Your email')));
        echo $this->Form->input('Message.title', array('label' => __d('croogo', 'Subject')));
        echo $this->Form->input('Message.body', array('label' => __d('croogo', 'Message')));
        if ($contact['Contact']['message_captcha']):
            echo $this->Recaptcha->display_form();
        endif;
        echo $this->Form->end(__d('croogo', 'Send'));
    ?>
    </div>
    <?php endif; ?>
</section>

<section class="direct-contact">
    <header>
        <h2><?php echo __('Direct Contact'); ?></h2>
    </header>

    <div class="inner">
        <?php echo $this->Layout->blocks('contacts'); ?>
    </div>

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('Accelerator.mentors');
    $this->end();
?>