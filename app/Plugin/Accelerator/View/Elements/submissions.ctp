<!-- Here is where we loop through our $posts array, printing out post info -->
<?php foreach ($ideas as $idea): ?>

    <article>
        <header>
            <h1><?php echo $this->Html->link($idea['Idea']['name'],
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'])); ?></h1>
            <p><time pubdate="pubdate">24-12-2013</time></p>
        </header>

        <div class="votes">
            <a href="">8 Up</a>
            <a href="">8 Down</a>
        </div>

        <p><?php echo $idea['Idea']['desc']; ?></p>

        <aside>
            <a href="">Comment</a>
            <a href="">FB Share</a>
        </aside>
    </article>

<?php endforeach; ?>
<?php unset($ideas); ?>

<!-- Individual Submissions -->
<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24-12-2013</time></p>
    </header>

    <div class="votes">
        <a href="">8 Up</a>
        <a href="">8 Down</a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

    <aside>
        <a href="">Comment</a>
        <a href="">FB Share</a>
    </aside>
</article>

<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24-12-2013</time></p>
    </header>

    <div class="votes">
        <a href="">8 Up</a>
        <a href="">8 Down</a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

    <aside>
        <a href="">Comment</a>
        <a href="">FB Share</a>
    </aside>
</article>

<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24-12-2013</time></p>
    </header>

    <div class="votes">
        <a href="">8 Up</a>
        <a href="">8 Down</a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

    <aside>
        <a href="">Comment</a>
        <a href="">FB Share</a>
    </aside>
</article>

<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24-12-2013</time></p>
    </header>

    <div class="votes">
        <a href="">8 Up</a>
        <a href="">8 Down</a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

    <aside>
        <a href="">Comment</a>
        <a href="">FB Share</a>
    </aside>
</article>

<article>
    <header>
        <h1><a href="idea.html">Social Business Albania</a></h1>
        <p><time pubdate="pubdate">24-12-2013</time></p>
    </header>

    <div class="votes">
        <a href="">8 Up</a>
        <a href="">8 Down</a>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat fjfnek. </p>

    <aside>
        <a href="">Comment</a>
        <a href="">FB Share</a>
    </aside>
</article>