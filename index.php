<?php
	session_start();
	
	require 'facebook-php-sdk-v4-4.0-dev/autoload.php';
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	
	const APPID = "460381927453941";
	const APPSECRET = "4b671fbfa5febea144c5b5944603188d";
	
	FacebookSession::setDefaultApplication(APPID, APPSECRET);
	
	$helper = new FacebookRedirectLoginHelper("http://localhost");
	$loginUrl = $helper->getLoginUrl();
	

?><!doctype html>
<html>
	<head>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '<?php echo APPID;?>',
		      xfbml      : true,
		      version    : 'v2.3'
		    });
		  };
		
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/fr_FR/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
	</head>
	<body>
		<div>
		<?php
		
			try {
				$session = $helper->getSessionFromRedirect();
			} catch(FacebookRequestException $ex) {
				// When Facebook returns an error
			} catch(\Exception $ex) {
				// When validation fails or other local issues
			}
			
			if ($session) {
				echo ' TOTO ET TATA TOTOTENT ';
			} else {
				echo '<a href="'.$loginUrl.'" > Se connecter </a>';
			}
			
		?>
		
		</div>
	
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
		<?php

		echo "FACEBOOK PROJECT";
		
		?>
		<div class="fb-comments" data-href="http://localhost" data-numposts="7" data-colorscheme="dark"></div>
	</body>
</html>
