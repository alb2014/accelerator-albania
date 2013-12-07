<img width="940" height="175" src="">
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi.</p>

<!-- Submission Section -->
<div class="columns-7-5">
    <section class="submissions main">
        <header>
            <ul id="submission_sort" class="submission-sort">
                <li>Order by:</li>
                <li><a href="">Date</a></li>
                <li><a href="">Popularity</a></li>
                <li><a href="">Topic</a></li>
            </ul>
            <h2>Submissions</h2>
        </header>

        <!-- Submissions -->
        <div>
            <?php
                echo $this->element('submissions');
            ?>
        </div>

    </section>

    <!-- The Program Section -->
    <section class="program">
        <header>
            <h2>The Program</h2>
        </header>

        <!-- Individual Infos -->
        <!-- Needs to become blocks in the admin -->
        <div>
            <h3>How to get to the next level</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>

            <h3>What you can win</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <h3>Social business</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

    </section>
</div>

<!-- Main Content Aside - Varies on Pages -->
<aside class="miscellaneous">
    <h3>Have a business idea of your own? Click here!</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</aside>

<?php
    $this->start('footer_bar');
        echo $this->element('mentors');
    $this->end();

    $this->start('faq');
        $this->Nodes->set($faq_node);
        echo $this->element('node_title', array(), array('plugin' => 'Nodes'));
        echo $this->element('node_body', array(), array('plugin' => 'Nodes'));
    $this->end();

?>
