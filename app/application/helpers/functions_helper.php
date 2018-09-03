<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 1/19/14
 * Time: 1:26 PM
 */

class functions_helper extends CI_Controller {

	public function format_phone($phone_number) {
		return preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $phone_number). "\n";
	}

	public function sanitize($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
} 