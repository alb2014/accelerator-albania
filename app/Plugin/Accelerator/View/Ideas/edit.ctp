<!-- Idea -->
<section class="idea edit">
    <header>
        <h2><?php echo __('Edit My Idea'); ?></h2>
    </header>

    <div class="inner">
        <?php
        $modelOpts = array('notforprofit'=>'Not For Profit',
                                    'nonprofit' =>'Nonprofit',
                                    'enterpriseb2b' => 'Enterprise/B2B',
                                    'b2c' => 'B2C',
                                    'subscription' => 'Subscription',
                                    'freemium' => 'Freemium',
                                    'retail' => 'Retail',
                                    'ecommerce' => 'ecommerce',
                                    'community' => 'Community',
                                    'advocacy' => 'Advocacy',
                                    'other' => 'Other'
                                    );
        $typeOpts =  array('social'=>'Social',
                                    'tech' =>'Tech',
                                    'scientific' => 'Scientific',
                                    'other' => 'Other');

        echo $this->Form->create('Idea');
        echo $this->Form->input('title', array('label' => 'Idea Title'));
        echo $this->Form->input('description', array('rows' => '3', 'label' => 'The Grab'));
        echo $this->Form->input('type', array('options'=> $typeOpts, 'label' => 'Type of Idea'));
        // Needs to be added to the table structure
        echo $this->Form->input('social_business', array('type' => 'checkbox', 'label' => 'Is this a social business?'));
        $user = AuthComponent::user();
        echo $this->Form->input('user_id', array('type' => 'hidden',
                            'value' => $user['id']));
        echo $this->Form->input('problem', array('rows' => '5',
                            ));
        echo $this->Form->input('solution', array('rows' => '5'));
        echo $this->Form->input('market', array('rows' => '5'));
        echo $this->Form->input('competition', array('rows' => '5'));
        echo $this->Form->input('model', array('options'=> $modelOpts));
        echo $this->Form->input('promise', array('rows' => '5'));

        echo $this->Form->input('private', array('type' => 'checkbox', 'label' => 'Keep this idea private'));

        echo $this->Form->end('Pitch');
        ?>

        <?php /* echo $this->Html->link('Cancel',
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id']),array('class' => 'button')); */ ?>
        <a class="button" href="/accelerator/ideas">Cancel</a>
    </div>
</section>

<!-- References Sidebar (block in admin) -->
<section class="references">
    <header>
        <h2><?php echo __('References'); ?></h2>
    </header>

    <div class="inner">
        <?php echo $this->Layout->blocks('tier-2-sidebar'); ?>
    </div>

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>