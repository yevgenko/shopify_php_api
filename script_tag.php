<?php
  /* Sessions */
  session_id();
  session_start();
	include('lib/shopify_api.php');

  if (!isset($_SESSION['shop']) || !isset($_SESSION['token'])) header("Location: login.php");
  $url = $_SESSION['shop'];
  $token = $_SESSION['token'];
	$api = new Session($url, $token, API_KEY, SECRET);

	//if the Shopify connection is valid
	if ($api->valid()) {

    // Create a new ScriptTag
    if ($_GET['create']) {
      $fields = array(
        'src' => 'http://localhost:8000/js/hello.js',
        'event' => 'onload',
      );
      $api->script_tag->create($fields);
    }

    // Get a list of all script tags for your shop
	  $script_tags = $api->script_tag->get();
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    	<meta http-equiv="imagetoolbar" content="no" />
    	<title>Shopify API: Login</title>
    	<link href="css/css.css" media="screen" rel="stylesheet" type="text/css" />
    </head>
    <body>
    	<div id="header">
    		<h1><a href="/">Shopify API</a></h1>
    	</div>

    	<div id="container" class="clearfix">

    		<ul id="tabs">
    		  <li><a href="index.php">Main</a></li>
    		  <li><a href="script_tag.php" id="current">Script Tag</a></li>
    			<li><a href="logout.php">Logout</a></li>
    		</ul>

    		<div id="main" class="clearfix">
          <h1>Script Tags</h1>

          <?php
            foreach($script_tags as $script_tag){
              echo $script_tag['src'].'<br />';
            }
          ?>
    		</div>
    	</div>
    </body>
    </html>
<?php
  }
?>
