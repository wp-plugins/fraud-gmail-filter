<?php
/*
Plugin Name: Fraud Gmail Filter
Plugin URI: http://saiful.im/fraud-gmail
Description: Fraud Gmail / Clone Gmail / Doteted Gmail Filter For Registration.
Version: 0.0.2
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
	return $user_email;
}

add_filter('user_registration_email', 'fraud_gmail');