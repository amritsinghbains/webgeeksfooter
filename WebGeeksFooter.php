<?php

/*
Plugin Name: Web Geeks Footer
Plugin URI: http://webgeeksmarketing.com
Description: A footer page for Web Geeks Marketing
Author: Amrit Bains
Version: 0.1
Author URI: https://linkedin.com/in/amritsinghbains
*/

add_action('admin_menu', 'adminAction');
add_action( 'admin_init', 'update_extra_post_info' );

if( !function_exists("update_extra_post_info") ) {
	function update_extra_post_info() {

		register_setting( 'extra-post-info-settings', 'WGcompanyName');
		register_setting( 'extra-post-info-settings', 'WGcompanyLink');
		register_setting( 'extra-post-info-settings', 'WGcopyrightText');
		register_setting( 'extra-post-info-settings', 'WGyear');
		register_setting( 'extra-post-info-settings', 'WGforegroundHex');
		register_setting( 'extra-post-info-settings', 'WGbackgroundHex');
	
	}
}
function adminAction()
{
	// add_options_page('Web Geeks Footer', 'Web Geeks Footer', 'manage_options', __FILE__, 'adminActionMain');


	add_menu_page( 
        __( 'Web Geeks Footer', 'Web Geeks Footer' ),
        'Web Geeks',
        'manage_options',
        'WebGeeksFooter',
        'adminActionMain',
        plugins_url( 'webgeeksfooter/images/icon.png' ),
        6
    );

}

function defaultValue($id, $value){
	if(strlen(get_option($id)) < 1){
   		return  $value;
   	}else{
   		return get_option($id);
   	}
}

function adminActionMain()
{
	wp_register_style( 'prefix-style', plugins_url('css/materialize.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
    wp_register_style( 'prefix-style2', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style2' );

    wp_register_script( 'custom-script', plugin_dir_url(__FILE__) . '/js/materialize.js' );
    wp_enqueue_script( 'custom-script' );
    wp_register_script( 'custom-script2', plugin_dir_url(__FILE__) . '/js/init.js' );
    wp_enqueue_script( 'custom-script2' );


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Web Geeks</title>
  <link rel="shortcut icon" href="image/favicon.ico">

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <!-- <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
</head>
<body>
  <nav class="blue" role="navigation" style="width:98%">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo" style="color: white">Web Geeks Footer</a>
    </div>
  </nav>

  <div class="container">
    <div class="section">
    <form method="post" action="options.php">
    <?php 
    	
	    settings_fields( 'extra-post-info-settings' ); 
	   	do_settings_sections( 'extra-post-info-settings' ); 

	   	$WGcompanyName = defaultValue('WGcompanyName', 'Web Geeks | Windsor, ON');
	   	$WGcompanyLink = defaultValue('WGcompanyLink', 'http://webgeeksmarketing.com');
	   	$WGcopyrightText = defaultValue('WGcopyrightText', 'Copyright');
	   	$WGyear = defaultValue('WGyear', '2016');
	   	$WGforegroundHex = defaultValue('WGforegroundHex', '#ffffff');
	   	$WGbackgroundHex = defaultValue('WGbackgroundHex', '#2196F3');

   	?>
     <div class="row">
        <div class="input-field col s10">
          <input id="WGcompanyName" name="WGcompanyName" type="text" class="validate" value="<?php echo $WGcompanyName; ?>">
          <label class="active" for="WGcompanyName">Company Name</label>
        </div>
        <div class="input-field col s10">
          <input id="WGcompanyLink" name="WGcompanyLink" type="text" class="validate" value="<?php echo $WGcompanyLink; ?>">
          <label class="active" for="WGcompanyLink">Company Link</label>
        </div>
        <div class="input-field col s10">
          <input id="WGcopyrightText" name="WGcopyrightText" type="text" class="validate" value="<?php echo $WGcopyrightText; ?>">
          <label class="active" for="WGcopyrightText">Copyright Text</label>
        </div>
        <div class="input-field col s10">
          <input id="WGyear" name="WGyear" type="text" class="validate" value="<?php echo $WGyear; ?>">
          <label class="active" for="WGyear">Year</label>
        </div>
        <div class="input-field col s10">
          <input id="WGforegroundHex" name="WGforegroundHex" type="text" class="validate" value="<?php echo $WGforegroundHex; ?>">
          <label class="active" for="WGforegroundHex">Foreground Hex</label>
        </div>
        <div class="input-field col s10">
          <input id="WGbackgroundHex" name="WGbackgroundHex" type="text" class="validate" value="<?php echo $WGbackgroundHex; ?>">
          <label class="active" for="WGbackgroundHex">Background Hex</label>
        </div>
        </div>
    <?php submit_button(); ?>
    </form>
    </div>
  </div>


  <footer class="page-footer blue" style="width:98%">
   
    <div class="footer-copyright">
      <div class="container">
      Copyright &copy; 2016 <a href="http://webgeeksmarketing.com" rel="home" style="color: white">Web Geeks | Windsor, ON</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  </body>
</html>
<?php
}

function insert_my_footer() {
	
	$WGcompanyName = defaultValue('WGcompanyName', 'Web Geeks | Windsor, ON');
   	$WGcompanyLink = defaultValue('WGcompanyLink', 'http://webgeeksmarketing.com');
   	$WGcopyrightText = defaultValue('WGcopyrightText', 'Copyright');
   	$WGyear = defaultValue('WGyear', '2016');
   	$WGforegroundHex = defaultValue('WGforegroundHex', '#ffffff');
   	$WGbackgroundHex = defaultValue('WGbackgroundHex', '#2196F3');

   	wp_register_style( 'prefix-style', plugins_url('css/materialize.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
    wp_register_style( 'prefix-style2', plugins_url('css/style.css', __FILE__) );
    // wp_enqueue_style( 'prefix-style2' );

    wp_register_script( 'custom-script', plugin_dir_url(__FILE__) . '/js/materialize.js' );
    // wp_enqueue_script( 'custom-script' );
    wp_register_script( 'custom-script2', plugin_dir_url(__FILE__) . '/js/init.js' );
    // wp_enqueue_script( 'custom-script2' );

    echo '<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>'.
    '<footer class="page-footer" style="width:100%; height:100px;'.   
    	'color:'.$WGforegroundHex.'; background:'.$WGbackgroundHex.'; ">'.
	    '<div class="footer-copyright" style="margin-top: 0px;">'.
	    	'<div class="container"><div class="left">© '.$WGcopyrightText.
	      	' '.$WGyear.'. All Rights Reserved. <a href="'.$WGcompanyLink.'" rel="home" style="color: white"> </div><div class="right"> Website Design</a> by '.
	      	$WGcompanyName.
	    	'</div>'.
	    '</div>'.
	'</footer>';


// <div class="footer-right">© Copyright 2015. All Rights Reserved.<br />
// <a href="http://webgeeksmarketing.com/" target="_blank">Website Design</a> by Web Geeks.</div>




}

add_action('wp_footer', 'insert_my_footer');
?>