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

        <?php } else { ?>

            <p>Login to add Comments</p>

        <?php } ?>

    </div>

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>