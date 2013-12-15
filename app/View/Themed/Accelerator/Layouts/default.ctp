<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <title><?php echo $title_for_layout . ' | ' . Configure::read('Site.title'); ?></title>
    
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="<?php echo __('accelerator', 'HAPide');?>">

        <?php 
            echo $this->Layout->meta();
            echo $this->fetch('facebook_meta');
            echo $this->Layout->feed();
            echo $this->Html->css(array('normalize'));
            echo $this->Html->css(array('main'));
            echo $this->Html->css(array('screen'));
            echo $this->Html->script(array('vendor/modernizr-2.6.2.min'));
        ?>
    </head>

    <body>
        <!-- <h1><?php echo $this->request->here; ?></h1> -->
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php
            // if ($loggedIn) {
            //     echo "<h1>Hi USER</h1>";
            // }
        ?>

        <div class="faq-tab">
            <a href="/page/faq" id="faq_tab"><?php echo __('FAQ');?></a>
        </div>
        <div class="content">

            <header class="global">
                <?php 
                if($this->Session->check('Auth.User')) { 
                    echo $this->Html->link(
                            __('Profile'),
                            array(
                                'plugin' => 'users',
                                'controller' => 'users',
                                'action' => 'index'
                            ),
                            array('class' => 'button login')
                        );
                } else { 

                    echo $this->Html->link(
                            __('Login'),
                            array(
                                'plugin' => 'users',
                                'controller' => 'users',
                                'action' => 'login'
                            ),
                            array('class' => 'button login','id' => 'header_login')
                        );

                } ?> 
                    
                <?php 
                    // echo $this->Html->link(
                    //     'Profile', 
                    //     array('plugin' => 'users', 'controller' => 'users', 'action' => 'index'), 
                    //     array('class' => 'button')
                    // ); 
                ?>

                <h1><a href="/accelerator"><?php echo __('HAPide');?></a></h1>

                <?php
                    // Help: is there a better way to set an active class?

                    $options_submit = array('escape' => false);
                    if($this->request->here == '/accelerator/ideas/add'){
                      $options_submit = array_merge($options_submit, array('class'=>'active'));
                    }
                    $options_engage = array('escape' => false);
                    if($this->request->here == '/accelerator/ideas'){
                      $options_engage = array_merge($options_engage, array('class'=>'active'));
                    }
                    $options_learn = array('escape' => false);
                    if($this->request->here == '/blog'){
                      $options_learn = array_merge($options_learn, array('class'=>'active'));
                    }
                ?>
                <nav>
                    <ul class="main-toggles">
                        <li>
                            <?php echo $this->Html->link(__('<span>HAP</span> Submit'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add'), $options_submit);?>
                        </li>
                        <li><?php echo $this->Html->link(__('<span>HAP</span> Engage'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index'), $options_engage); ?></li>
                        <li>
                            <?php echo $this->Html->link(__('<span>HAP</span> Learn'), '/blog', $options_learn); ?></li>
                        <li class="sub"><a href="/about"><?php echo __('What is this?');?></a></li>
                    </ul>
                </nav>
            </header>

            <div class="main">

                <?php echo $this->Session->flash('flash', array('element' => 'flash_message')); ?>

                <?php echo $content_for_layout; ?>

            </div>

            <?php echo $this->fetch('footer_bar'); ?>

            <footer>
                <div>
                    <div class="sitemap">
                        <h3><?php echo __('Sitemap')?></h3>
                        <nav>
                            <ul>
                                <li><?php echo $this->Html->link(__('Submit'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__('Engage'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')); ?></li>
                                <li><a href="/blog"><?php echo __('Learn');?></a></li>
                                <li>
                                    <?php 
                                    if($this->Session->check('Auth.User')) { 
                                        echo $this->Html->link(
                                                __('Profile'),
                                                array(
                                                    'plugin' => 'users',
                                                    'controller' => 'users',
                                                    'action' => 'index'
                                                )
                                                
                                            );
                                    } else { 

                                        echo $this->Html->link(
                                                __('Login'),
                                                array(
                                                    'plugin' => 'users',
                                                    'controller' => 'users',
                                                    'action' => 'login'
                                                ),
                                                array('id' => 'footer_login')
                                            );

                                    } ?> 
                                </li>
                                <?php if($this->Session->check('Auth.User')) { ?>
                                        <li>
                                        <?php
                                            echo $this->Html->link(
                                                __('Logout'),
                                                array(
                                                    'plugin' => 'users',
                                                    'controller' => 'users',
                                                    'action' => 'logout'
                                                )
                                                
                                            );
                                        ?>
                                        </li>
                                <?php } ?>
                            </ul>

                            <ul>
                                <li><a href="/blog">News</a></li>
                                <li><?php echo $this->Html->link(__('Submissions'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')); ?></li>
                                <li><a href="/about"><?php echo __('What is this?');?></a></li>
                                <li><a href="/about"><?php echo __('About');?></a></li>
                            </ul>

                            <ul>
                                <!-- <li><?php //echo $this->Html->link('Yunus SB', array()); ?></li> -->
                                <li><a href="http://www.yunussb.com/" target="_blank"><?php echo __('Yunus SB'); ?></a></li>
                                <li><a href="http://www.undp.org/content/undp/en/home.html" target="_blank"><?php echo __('UNDP');?></a></li>
                                <li><a href="/page/terms-and-conditions"><?php echo __('Terms &amp; Conditions');?></a></li>
                                <li><a href="/contact"><?php echo __('Contact');?></a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="social">
                        <h3><?php echo __('Follow Us')?></h3>
                        <ul>
                            <li><a href="" class="fb"><?php echo __('Facebook')?></a></li>
                            <li><a href="" class="google"><?php echo __('Google+')?></a></li>
                            <li><a href="/promoted.rss" class="rss" target="_blank"><?php echo __('RSS')?></a></li>
                        </ul>
                    </div>

                    <p><?php echo __('&copy;2013 YUNUS Albania commissioned by UNPD')?></p>
                </div>

            </footer>

        </div>

        <div id="login" class="modal">
            <div>
                <a href="#close" title="Close" class="modal-close">x</a>
                <h2><?php echo __('Login');?></h2>
                <?php
                    echo $this->element('login_form', array(), array('plugin' => 'Users'));
                ?>
            </div>
        </div>

        <div id="faq" class="modal">
            <div>
                <a id="close" title="<?php echo __('Close');?>" class="modal-close">x</a>
                <?php
                    echo $this->Layout->blocks('faq');
                ?>
            </div>
        </div>

        <?php
            echo $this->Layout->js();
            echo $scripts_for_layout;
            echo $this->Html->script(array(
                'vendor/modernizr-2.6.2.min',
                'vendor/jquery-1.10.2.min',
                'plugins',
                'main'
            ));
        ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            // e.src='//www.google-analytics.com/analytics.js';
            // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            // ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=239655156201853";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </body>
</html>