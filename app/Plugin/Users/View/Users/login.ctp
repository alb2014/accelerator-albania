<section class="users login">
    <header>
        <h2><?php echo __d('croogo', 'Login'); ?></h2>
    </header>

    <div>
        <?php
            echo $this->element('login_form');
            echo $this->Facebook->login();
            echo $this->Facebook->registration();
        ?>
    </div>

</section>

<?php
    $this->start('footer_bar');
    echo $this->element('Accelerator.organization_info');
    echo $this->element('Accelerator.mentors');
    $this->end();
?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo getenv('FB_APPID'); ?>' , // App ID
      channelUrl : '//'+window.location.hostname+'/facebook/channel', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
    FB.Event.subscribe('auth.statusChange', function(response){
        if (response.status == "connected"){
            alert('redirecting you to auto facebook login');
                //here is out default place for login
            window.location.href = "http://"+window.location.hostname + "/facebook/login";
        }
    });
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
<?php e($this->Facebook->login(array('registration-url'=>'http://www.yoursite.com/facebook/signup'))); ?>
