<?PHP
$fb = new Facebook\Facebook([
    'app_id' => '1502782619756958', // Replace {app-id} with your app id
    'app_secret' => '4227188ed6579b3e7ea658d5fa7ab7bf',
    'default_graph_version' => 'v2.2',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);
  
  echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

  ?>