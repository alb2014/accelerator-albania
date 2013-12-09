<!-- Here is where we loop through our $ideas array, printing out idea info -->
<?php foreach ($ideas as $idea): ?>

    <article data-date="" data-type="<?php echo $idea['Idea']['type']; ?>" data-votes="">
        <header>
            <h1><?php echo $this->Html->link($idea['Idea']['name'],
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'])); ?></h1>
            <p><time pubdate="pubdate">24.12.2013</time></p>
        </header>

        <?php echo $this->element('Accelerator.votes', array("idea" => $idea)); ?>

        <div>
            <p class="description"><?php echo $idea['Idea']['desc']; ?></p>

            <aside>
                <?php echo $this->Html->link('Comment',
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'], '#' => 'comments'), array('class' => 'share_comment')); ?>
                <?php echo $this->Html->link('Comment',
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'], '#' => 'share'), array('class' => 'share_fb')); ?>
            </aside>

        </div>

    </article>

<?php endforeach; ?>
<?php unset($ideas); ?>

<!-- Individual Submissions -->
<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24.12.2013</time></p>
    </header>

    <div class="votes">
        <a href="" class="up voted" data-idea-id="">34</a>
        <a href="" class="down" data-idea-id="">8</a>
    </div>

    <div>

        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

        <aside>
            <a href="" class="share_comment">Comment</a>
            <a href="" class="share_fb">FB Share</a>
        </aside>

    </div>

</article>

<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24.12.2013</time></p>
    </header>

    <div class="votes">
        <a href="" class="up" data-idea-id="">34</a>
        <a href="" class="down voted" data-idea-id="">8</a>
    </div>

    <div>

        <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

        <aside>
            <a href="" class="share_comment">Comment</a>
            <a href="" class="share_fb">FB Share</a>
        </aside>

    </div>
    
</article>