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
        <?php 
            echo $this->Layout->meta();
            echo $this->Layout->feed();
            echo $this->Html->css(array('normalize'));
            echo $this->Html->css(array('main'));
            echo $this->Html->css(array('screen'));
            echo $this->Html->script(array('vendor/modernizr-2.6.2.min'));
        ?>
    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php
            // if ($loggedIn) {

            //     echo "<h1>Hi USER</h1>";
            // }
        ?>

        <div class="faq-tab">
            <a href="#faq">FAQ</a>
        </div>
        <div class="content">

            <header class="global">
                <?php 
                if($this->Session->check('Auth.User')) { 
                    echo $this->Html->link(
                            'Logout',
                            array(
                                'plugin' => 'users',
                                'controller' => 'users',
                                'action' => 'logout'
                            ),
                            array('class' => 'button login')
                            
                        );
                } else { ?>
                    <a href="#login" class="button login">Login</a> 
                        
                <?php } ?> 
                    
                <?php 
                    // echo $this->Html->link(
                    //     'Profile', 
                    //     array('plugin' => 'users', 'controller' => 'users', 'action' => 'index'), 
                    //     array('class' => 'button')
                    // ); 
                ?>

                <h1><a href="/accelerator">HAPide</a></h1>

                <nav>
                    <ul class="main-toggles">
                        <li><?php echo $this->Html->link('Submit',
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link('Engage',
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'index')); ?></li>
                        <li><a href="/blog">Learn</a></li>
                        <li class="sub"><a href="#faq">What is this?</a></li>
                    </ul>
            </header>

            <div class="main">

                <?php echo $content_for_layout; ?>

            </div>

            <?php echo $this->fetch('footer_bar'); ?>

            <footer>
                <div>
                    <div class="sitemap">
                        <h3>Sitemap</h3>
                        <nav>
                            <ul>
                                <li><a href="/accelerator/ideas/add">Submit</a></li>
                                <li><a href="/accelerator/ideas">Engage</a></li>
                                <li><a href="/blog">Learn</a></li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'Login', 
                                            array(
                                                'plugin' => 'users', 
                                                'controller' => 'users', 
                                                'action' => 'login'
                                            )
                                        ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                        echo $this->Html->link(
                                            'Logout', 
                                            array(
                                                'plugin' => 'users', 
                                                'controller' => 'users', 
                                                'action' => 'logout'
                                            )
                                        ); 
                                    ?>
                                </li>
                            </ul>

                            <ul>
                                <li><a href="/blog">News</a></li>
                                <li><a href="/accelerator/ideas">Submissions</a></li>
                                <li><a href="/page/faq">What is this?</a></li>
                                <li><a href="/about">About</a></li>
                            </ul>

                            <ul>
                                <li><a href="/blog/more-about-yunus">Yunus SB</a></li>
                                <li><a href="">UNDP</a></li>
                                <li><a href="">Albania</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="social">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="" class="fb">Facebook</a></li>
                            <li><a href="" class="google">Google+</a></li>
                            <li><a href="" class="rss">RSS</a></li>
                        </ul>
                    </div>

                    <p>&copy;2013 YUNUS Albania commissioned by UNPD</p>
                </div>

            </footer>

        </div>

        <div id="login" class="modal">
            <div>
                <a href="#close" title="Close" class="modal-close">x</a>
                <h2>Login</h2>
                <?php
                    echo $this->element('login_form', array(), array('plugin' => 'Users'));
                ?>
            </div>
        </div>

        <div id="faq" class="modal">
            <div>
                <a href="#close" title="Close" class="modal-close">x</a>
                <?php echo $this->fetch('faq'); ?>
                <p>TBD</p>
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
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>