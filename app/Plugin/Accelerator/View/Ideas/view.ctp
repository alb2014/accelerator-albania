<!-- Main Content / Customized from here -->
<img width="940" height="175" src="images/homepage.jpg">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi.</p>


<!-- Column Section -->
<div class="columns-7-5">

    <!-- Idea -->
    <section class="idea">
        <header>
            <div class="votes">
                <a href="" class="up" data-idea-id="<?php echo $idea['Idea']['id']; ?>">34</a>
                <a href="" class="down" data-idea-id="<?php echo $idea['Idea']['id']; ?>">8</a>
            </div>
            <h2>Idea Page</h2>
        </header>

        <div class="inner">

            <h3>Idea Name</h3>
            <p><?php echo $idea['Idea']['name']; ?></p>

            <h3>Idea Description</h3>
            <p><?php echo $idea['Idea']['desc']; ?></p>

            <h3>Idea Category</h3>
            <p><?php echo $idea['Idea']['type']; ?></p>

            <h3>Voted to round #2</h3>

            <?php echo $this->Html->link('Edit my idea',
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button')); ?>

        </div>

    </section>

    <!-- Idea -->
    <section class="comments">
        <header>
            <h2><?php __('Comments'); ?></h2>
        </header>

        <div class="inner">

            <?php 
                if($this->Session->check('Auth.User')) { 
            ?>
                <p>DISQUS Comments Here (user is logged in)</p>

            <?php } else { ?>

                <p>Login to add Comments</p>

            <?php } ?>

        </div>

    </section>

    <!-- Submissions Sidebar (module) -->
    <section class="submissions sidebar">
        <header>
            <h2><a href="">Submissions</a></h2>
        </header>

        <!-- Submissions -->
        <?php
            echo $this->element('submissions');
        ?>

    </section>

</div>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>