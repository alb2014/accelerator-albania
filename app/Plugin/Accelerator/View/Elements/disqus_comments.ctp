 <?php
	    	
	// $disqus_auth_str =  $disqus_sso['message'] . ' ' . 
	// $disqus_sso['hmac'] . ' ' . 
	// $disqus_sso['timestamp'];
?>
<script type="text/javascript">
    var disqus_config = function () {
        //This is required before using comments
        // The generated payload which authenticates users with Disqus
        this.page.remote_auth_s3 = "<?php echo $disqus_auth_str ?>";
        this.page.api_key = "<?php echo $disqus_pubkey ?>"; 
    }
</script>

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