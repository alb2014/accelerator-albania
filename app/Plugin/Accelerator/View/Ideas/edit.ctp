<!-- Idea -->
<section class="idea edit">
    <header>
        <h2><?php echo __d('accelerator','Edit My Idea'); ?></h2>
    </header>
    
    <div class="inner">
        <?php
        /// This is used to make fields uneditable once a voting threshold has been passed
        if ($idea['tier_level'] > 0){
            $tierConfig = array('readonly' => 'readonly');
        } else {
            $tierConfig = array();
        }
        $modelOpts = array('notforprofit'=>__d('accelerator', 'Not For Profit'),
                                    'nonprofit' =>__d('accelerator', 'Nonprofit'),
                                    'enterpriseb2b' => __d('accelerator', 'Enterprise/B2B'),
                                    'b2c' => __d('accelerator','B2C'),
                                    'subscription' => __d('accelerator', 'Subscription'),
                                    'freemium' => __d('accelerator', 'Freemium'),
                                    'retail' => __d('accelerator', 'Retail'),
                                    'ecommerce' => __d('accelerator', 'ecommerce'),
                                    'community' => __d('accelerator', 'Community'),
                                    'advocacy' => __d('accelerator', 'Advocacy'),
                                    'other' => __d('accelerator', 'Other')
                                    );
        echo $this->Form->create('Idea');
        echo $this->Form->input('title', 
            array_merge(
                $tierConfig,
                array(
                    'label' => __d('accelerator','Idea Title'),
                    'value ' => $idea['name']
                ))
            );
        echo $this->Form->input('description', 
            array_merge(
            $tierConfig,
            array(
                'rows' => '3', 
                'label' => __d('accelerator','The Grab'),
                'value' => $idea['desc']
                )));

        echo $this->Form->input('type',array_merge($tierConfig, array('options'=> $ideaTypes, 'label' => __d('accelerator','Type of Idea'))));
        // Needs to be added to the table structure

        ?> 

        <span id="social_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __d('accelerator','Social hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

        echo $this->Form->input('social_business', array_merge($tierConfig, array('type' => 'checkbox', 'label' => __d('accelerator','Is this a social business?'))));

        $user = AuthComponent::user();
        //echo $this->Form->input('user_id', array('type' => 'hidden'));
        
        if($idea['tier_level'] > 0): 

        ?> 

        <span id="problem_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __d('accelerator','Problem hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
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
                <?php echo __d('accelerator','Solution hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('solution', array('rows' => '5',
                                                      'label' => __d('accelerator', 'The Solution')));

        ?> 

        <span id="market_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __d('accelerator','Market hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php
            echo $this->Form->input('market', array('rows' => '5',
                                                    'label' => __d('accelerator', 'The Market')));

        ?> 

        <span id="competition_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __d('accelerator','Competition hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('competition', array('rows' => '5',
                                                        'label' => __d('accelerator', 'The Competition')));
            echo $this->Form->input('model', array('options'=> $modelOpts));

        ?> 

        <span id="promise_help" class="form-help">
            <a href="">[?]</a>
            <div>
                <?php echo __d('accelerator','Promise hint: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.');?>
            </div>
        </span> 

        <?php

            echo $this->Form->input('promise', array('rows' => '5',
                                                    'label' => __d('accelerator', 'Our Promise')));

        endif;

        echo $this->Form->input('private', array('type' => 'checkbox', 'label' => __d('accelerator', 'Keep this idea private')));

        echo $this->Form->end(__d('accelerator', 'Pitch'));
        ?>

        <?php /* echo $this->Html->link('Cancel',
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id']),array('class' => 'button')); */ ?>
        <a class="button" href="/accelerator/ideas"><?php echo __d('accelerator','Cancel');?></a>

        <?php  if($idea['tier_level'] > 0): 

            echo $this->Html->link(
            __d('accelerator', 'Submit to Jury'),
            array(
                'module' => 'accelerator',
                'action' => 'submitIdea',
                'id' => $idea['id'],
                'full_base' => true,
                'label' => __d('accelerator','Submit to Jury')
            ),
            array('class' => 'button')
        );

        endif; ?>

    </div>
</section>

<?php  if($idea['tier_level'] > 0): ?>
<!-- References Sidebar (block in admin) -->
<section class="references">
    <header>
        <h2><?php echo __d('accelerator','References'); ?></h2>
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