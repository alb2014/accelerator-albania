<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title_for_layout . ' | ' . Configure::read('Site.title'); ?></title>
    
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="<?php echo __d('accelerator','accelerator', 'HAPide');?>">
        <meta property="og:image" content="<?php echo $this->Html->url('/theme/Accelerator/img/hapide_square.png', true); ?>">

        <?php 
            echo $this->Layout->meta();
            echo $this->fetch('facebook_meta');
            echo $this->Layout->feed();
            echo $this->Html->css(array('screen'));
            echo $this->Html->script(array('vendor/modernizr-2.6.2.min'));
        ?>

        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160" />
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="/mstile-144x144.png" />
    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="faq-tab">
            <a href="/page/faq" id="faq_tab"><?php echo __d('accelerator','FAQ');?></a>
        </div>
        <div class="content">

            <header class="global">
                <?php 
                if($this->Session->check('Auth.User')) { 
                    echo $this->Html->link(
                            __d('accelerator','Profile'),
                            array(
                                'plugin' => 'users',
                                'controller' => 'users',
                                'action' => 'index'
                            ),
                            array('class' => 'button login')
                        );
                } else { 

                    echo $this->Html->link(
                            __d('accelerator','Login'),
                            array(
                                'plugin' => 'users',
                                'controller' => 'users',
                                'action' => 'login'
                            ),
                            array('class' => 'button login','id' => 'header_login')
                        );

                } ?> 

                <h1><a href="/accelerator"><?php echo __d('accelerator','HAPide');?></a></h1>

                <?php
                    // Is there a better way to set an active class?

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
                            <?php echo $this->Html->link(__d('accelerator','<span>HAP</span> Submit'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add'), $options_submit);?>
                        </li>
                        <li><?php echo $this->Html->link(__d('accelerator','<span>HAP</span> Engage'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index'), $options_engage); ?></li>
                        <li>
                            <?php echo $this->Html->link(__d('accelerator','<span>HAP</span> Learn'), '/blog', $options_learn); ?></li>
                        <li class="sub"><a href="/about"><?php echo __d('accelerator','What is this?');?></a></li>
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
                        <h3><?php echo __d('accelerator','Sitemap')?></h3>
                        <nav>
                            <ul>
                                <li><?php echo $this->Html->link(__d('accelerator','Submit'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add')); ?></li>
                                <li><?php echo $this->Html->link(__d('accelerator','Engage'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')); ?></li>
                                <li><a href="/blog"><?php echo __d('accelerator','Learn');?></a></li>
                                <li>
                                    <?php 
                                    if($this->Session->check('Auth.User')) { 
                                        echo $this->Html->link(
                                                __d('accelerator','Profile'),
                                                array(
                                                    'plugin' => 'users',
                                                    'controller' => 'users',
                                                    'action' => 'index'
                                                )
                                                
                                            );
                                    } else { 

                                        echo $this->Html->link(
                                                __d('accelerator','Login'),
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
                                                __d('accelerator','Logout'),
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
                                <li><?php echo $this->Html->link(__d('accelerator','Submissions'), array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')); ?></li>
                                <li><a href="/about"><?php echo __d('accelerator','What is this?');?></a></li>
                                <li><a href="/about"><?php echo __d('accelerator','About');?></a></li>
                            </ul>

                            <ul>
                                <li><a href="http://www.yunussb.al/index.php/sq/" target="_blank"><?php echo __d('accelerator','Yunus SB'); ?></a></li>
                                <li><a href="http://www.al.undp.org/albania/en/home.html" target="_blank"><?php echo __d('accelerator','UNDP');?></a></li>
                                <li><a href="/page/terms-and-conditions"><?php echo __d('accelerator','Terms &amp; Conditions');?></a></li>
                                <li><a href="/contact"><?php echo __d('accelerator','Contact');?></a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="social">
                        <h3><?php echo __d('accelerator','Follow Us')?></h3>
                        <ul>
                            <li><a href="https://www.facebook.com/ysbalbania" class="fb" target="_blank"><?php echo __d('accelerator','Facebook')?></a></li>
                            <li><a href="https://plus.google.com/+Yunussb/posts" class="google" target="_blank"><?php echo __d('accelerator','Google+')?></a></li>
                            <li><a href="/promoted.rss" class="rss" target="_blank"><?php echo __d('accelerator','RSS')?></a></li>
                        </ul>
                    </div>

                    <p><?php echo __d('accelerator','&copy;2013 YUNUS Albania commissioned by UNPD')?></p>
                </div>

            </footer>

        </div>

        <div id="login" class="modal">
            <div>
                <a href="#close" title="Close" class="modal-close">x</a>
                <h2><?php echo __d('accelerator','Login');?></h2>
                <?php
                    echo $this->element('login_form', array(), array('plugin' => 'Users'));
                ?>
            </div>
        </div>

        <div id="faq" class="modal">
            <div>
                <a id="close" title="<?php echo __d('accelerator','Close');?>" class="modal-close">x</a>
                <?php
                    echo $this->Layout->blocks('faq');
                ?>
            </div>
        </div>

        <?php
            echo $this->Layout->js();
            echo $scripts_for_layout;
            echo $this->Html->script(array(
                'build/production.min.js'
            ));
        ?>

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-46675259-1', 'hapide.com');
            ga('send', 'pageview');
        </script>

    </body>
</html>