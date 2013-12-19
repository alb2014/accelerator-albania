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
        echo $this->Form->create('Idea');
        echo $this->Form->input('title', 
            array(
                'label' => __('Idea Title'),
                'value ' => $idea['name']
                )
            );
        echo $this->Form->input('description', 
            array(
                'rows' => '3', 
                'label' => __('The Grab'),
                'value' => $idea['desc']
                ));

        echo $this->Form->input('type', array('options'=> $ideaTypes, 'label' => __('Type of Idea')));
        // Needs to be added to the table structure

        ?> 

        <span id="social_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Social hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

        echo $this->Form->input('social_business', array('type' => 'checkbox', 'label' => __('Is this a social business?')));

        $user = AuthComponent::user();
        echo $this->Form->input('user_id', array('type' => 'hidden',
                            'value' => $user['id']));
        
        if($idea['tier_level'] > 0): 

        ?> 

        <span id="problem_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Problem hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php
            echo $this->Form->input('problem', 
                array(
                    'rows' => '5',
                    'value' => $idea['problem']
                ));

        ?> 

        <span id="solution_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Solution hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('solution', array('rows' => '5'));

        ?> 

        <span id="market_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Market hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php
            echo $this->Form->input('market', array('rows' => '5'));

        ?> 

        <span id="competition_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Competition hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('competition', array('rows' => '5'));
            echo $this->Form->input('model', array('options'=> $modelOpts));

        ?> 

        <span id="promise_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __('Promise hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('promise', array('rows' => '5'));

        endif;

        echo $this->Form->input('private', array('type' => 'checkbox', 'label' => 'Keep this idea private'));

        echo $this->Form->end('Pitch');
        ?>

        <?php /* echo $this->Html->link('Cancel',
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id']),array('class' => 'button')); */ ?>
        <a class="button" href="/accelerator/ideas"><?php echo __('Cancel');?></a>
    </div>
</section>

<?php  if($idea['tier_level'] > 0): ?>
<!-- References Sidebar (block in admin) -->
<section class="references">
    <header>
        <h2><?php echo __('References'); ?></h2>
    </header>

    <div class="inner">
        <?php echo $this->Layout->blocks('tier-2-sidebar'); ?>
    </div>

</section>

<?php endif; ?>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>