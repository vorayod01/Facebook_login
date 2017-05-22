<?php
require_once __DIR__ . '/src/facebook/autoload.php';
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$appId = '272029843200720';
$appSecret = '03f9adc4eaa7083606ef675f57e37474';
$fbRedirectURL = 'http://www.mytest.me/';
$fbPermissions = ['email']; 


$fb = new Facebook\Facebook([
  'app_id' => $appId,
  'app_secret' => $appSecret,
  'default_graph_version' => 'v2.8',
]);

// Get redirect login helper
$helper = $fb->getRedirectLoginHelper();

// Try to get access token
try {
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    }else{
          $accessToken = $helper->getAccessToken();
    }
} catch(FacebookResponseException $e) {
     echo 'Graph returned an error: ' . $e->getMessage();
      exit;
} catch(FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
}
?>
