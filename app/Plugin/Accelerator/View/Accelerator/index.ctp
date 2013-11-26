<section class="main index">
    <img width="940" height="175" src="">
    <h2><?php echo $title_for_layout; ?></h2>
    <p><?php echo __($acceleratorVariable); ?></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi.</p>


    <!-- Column Section -->
    <div class="columns-7-5">

        <!-- News Section -->
        <section class="news">
            <header>
                <h2><a href="learn.html">News</a></h2>
            </header>

            <!-- Individual News Items -->
            <article>
                <div class="image">
                    <img src="" width="130" height="90" alt="">
                </div>

                <div class="content">
                    <header>
                        <p><time pubdate="pubdate">24-12</time></p>
                        <h1><a href="">It's a new day for Social Business</a></h1>
                    </header>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... 
                        <br><a href="">Read more...</a>
                    </p>
                </div>
            </article>

            <article>
                <div class="image">
                    <img src="" width="130" height="90" alt="">
                </div>

                <div class="content">
                    <header>
                        <p><time pubdate="pubdate">24-12</time></p>
                        <h1><a href="">It's a new day for Social Business</a></h1>
                    </header>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... 
                        <br><a href="">Read more...</a>
                    </p>
                </div>
            </article>

            <article>
                <div class="image">
                    <img src="" width="130" height="90" alt="">
                </div>

                <div class="content">
                    <header>
                        <p><time pubdate="pubdate">24-12</time></p>
                        <h1><a href="">It's a new day for Social Business</a></h1>
                    </header>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... 
                        <br><a href="">Read more...</a>
                    </p>
                </div>
            </article>

            <article>
                <div class="image">
                    <img src="" width="130" height="90" alt="">
                </div>

                <div class="content">
                    <header>
                        <p><time pubdate="pubdate">24-12</time></p>
                        <h1><a href="">It's a new day for Social Business</a></h1>
                    </header>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... 
                        <br><a href="">Read more...</a>
                    </p>
                </div>
            </article>

        </section>

        <section class="submissions sidebar">
            <header>
                <h2><a href="">Submissions</a></h2>
            </header>

            <!-- List of Submissions -->
            <?php
                echo $this->element('submissions');
            ?>

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

</section>

<?php
    echo $this->element('mentors');
?>