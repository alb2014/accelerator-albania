<!-- Idea -->
<section class="idea">
    <header>
        <h2>Idea Page</h2>
    </header>

    <?php echo $this->element('Accelerator.votes', array("idea" => $idea)); ?>

    <div class="info">
        <h3>Idea Name</h3>
        <p><?php echo $idea['Idea']['name']; ?></p>

        <h3>Idea Description</h3>
        <p><?php echo $idea['Idea']['desc']; ?></p>

        <h3>Idea Category</h3>
        <p class="idea-type"><?php echo $idea['Idea']['type']; ?></p>

        <?php echo $this->Html->link('Edit my idea',
    array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button')); ?>
    </div>

</section>

<!-- Submissions Sidebar (module) -->
<section class="submissions sidebar">
    <header>
        <h2><a href="">Submissions</a></h2>
    </header>

    <!-- Submissions -->
    <?php
        echo $this->element('submissions', array("full" => false));
    ?>

</section>

<!-- Idea Comments -->
<section class="idea-comments" id="comments">
    <header>
        <h2><?php __('Comments'); ?></h2>
    </header>

    <div class="inner">

        <?php 
            if($this->Session->check('Auth.User')) { 
        ?>
            <p>DISQUS Comments Here (user is logged in)</p>

            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'hapide'; // required: replace example with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

        <?php } else { ?>

            <p>
                <a href="#login" class="button"><?php echo __('Login to Comment'); ?></a> 
            </p>

        <?php } ?>

    </div>

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>