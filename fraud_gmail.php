<?php
/*
Plugin Name: Fraud Gmail Filter
Plugin URI: http://saiful.im/fraud-gmail
Description: Fraud Gmail / Clone Gmail / Doteted Gmail Filter For Registration.
Version: 0.0.3
Author: Saiful Islam
Author URI: http://saiful.im/
*/

function fraud_gmail($user_email)
{
	$user_email = strtolower($user_email);
	$data = explode('@', $user_email);
	if(count($data)===2)
	{
		if(preg_match("/g(oogle)?mail(.*)/", $data[1], $ext))
		{
			$trick = explode('+', $data[0]);
			if(count($trick)>0)
			{
				$data[0] = $trick[0];
			}
			$user_email = str_replace(array('.','+'), '', $data[0]).'@gmail'.$ext[2];
		}
	}
	$error = "This is Error";
	return $user_email;
}

function blocked_domain_filter($errors, $sanitized_user_login, $user_email) {
	$data = explode('@', $user_email);
	$blocked = explode("\n",get_option('fgf_blocked_domains'));
	if(in_array($data[1], $blocked)){
		$errors->add( 'demo_error', __('<strong>ERROR</strong>: This Domain Is Blocked By Admin.','') );
	}
    return $errors;
}

add_filter('user_registration_email', 'fraud_gmail', 10, 1);
add_action( 'registration_errors', 'blocked_domain_filter', 10, 3 );


// Setting Page
add_action('admin_menu', 'fgf_setting');

function bootstrap_for_admin() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-docs', 'http://getbootstrap.com/assets/css/docs.min.css');
}

function fgf_register_settings() {
	register_setting( 'fgf-option-group', 'fgf_blocked_domains' );
	// add_option( 'fgf_blocked_domains', '');
	// register_setting( 'default', 'fgf_blocked_domains' ); 
} 
add_action( 'admin_init', 'fgf_register_settings' );



function fgf_setting() {
	add_action('admin_enqueue_scripts', 'bootstrap_for_admin');
	add_options_page( 'FGF Settings', 'FGF Settings', 'administrator', __FILE__, 'fgf_settings_page');
}

function fgf_settings_page(){
	echo '
	<div class="col-lg-10">
		<h2>Set domains which are not allowed</h2>
		'.settings_errors().'
		<blockquote class="bs-callout bs-callout-info">
			  <p>Adding domain names to this list will prevent signups from those domains. Please press enter after every <strong>Doamin Name</strong>.<br>
			  Leave it empty if you don\'t want to block any domain.</p>
		</blockquote>

	<form action="options.php" method="POST" role="form">';
		settings_fields( 'fgf-option-group' );
	echo
	'
		<div class="form-group">
			<label for="fgf_blocked_domains">Blocked Domain\'s List</label>
			<textarea name="fgf_blocked_domains" class="form-control" rows="10" id="fgf_blocked_domains">'.get_option('fgf_blocked_domains').'</textarea>
		</div>

		<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes" />
	</form>
	</div>
	';
}

