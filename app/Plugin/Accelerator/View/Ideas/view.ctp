<!-- Main Content / Customized from here -->
<section class="main homepage">
    <img width="940" height="175" src="">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi.</p>


    <!-- Column Section -->
    <div class="columns-7-5">

        <!-- Idea -->
        <section class="idea">
            <header>
                <div class="votes">
                    <a href="">8 Up</a>
                    <a href="">8 Down</a>
                </div>
                <h2>Idea Page</h2>
            </header>

            <h3>Idea Name</h3>
            <p><?php echo $idea['Idea']['name']; ?></p>

            <h3>Idea Description</h3>
            <p><?php echo $idea['Idea']['desc']; ?></p>

            <h3>Idea Category</h3>
            <p><?php echo $idea['Idea']['type']; ?></p>

            <h3>Voted to round #2</h3>

            <h3>Comments</h3>

            <?php echo $this->Html->link('Edit my idea',
array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id']), array('class' => 'button')); ?>

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

</section>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();
?>