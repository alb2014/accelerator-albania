<img width="940" height="175" src="../../View/Themed/Accelerator/webroot/img/homepage.jpg">
<?php
    // echo $this->Html->image(array('homepage.jpg'));
?>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi.</p>

<!-- Submission Section -->
<section class="submit-idea">
    <header>
        <h2>Submit Idea</h2>
    </header>

    <div class="inner">
        <?php
            echo $this->element('add_form');
        ?>
    </div>

<!--             <fieldset>
        <legend>Idea Category:</legend>

        <input type="radio" name="category" id="category1" value="social">
        <label for="category1">Social Business</label>

        <input type="radio" name="category" id="category2" value="tech">
        <label for="category1">Tech Business</label>

        <input type="radio" name="category" id="category2" value="science">
        <label for="category1">Scientific Development</label>

        <input type="radio" name="category" id="category2" value="other">
        <label for="category1">Other</label>
    </fieldset> -->

<!--             <input type="checkbox" name="social_business" id="social_business" value="1">
    <label for="social_business">Is this a social business?</label> -->

</section>

<!-- The Program Section -->
<!-- If no user -->
<p>(Hide this section if user is logged in)</p>
<section class="create-profile">
    <header>
        <h2>Create Profile</h2>
    </header>

    <?php
        echo $this->element('add_form', array(), array('plugin' => 'Users'));
    ?>

    <!-- Main Content Aside - Varies on Pages -->
    <div class="inner">
        <h3>Competition Details</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

</section>



<?php
    $this->start('footer_bar');
        echo $this->element('organization_info');
        echo $this->element('mentors');
    $this->end();
?>
