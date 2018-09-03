<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of send_mail
 *
 * @author fcarpio
 */

define('LIBRARY', 'html2pdf');
define('FILE_DIRECTORY', './assets/pdfs/');
define('SIZE', 'LETTER');
define('ORIENTATION', 'landscape');

class qmail extends CI_Model
{

    
    /**
     * 
     * @param string $file_name
     * @param string $view
     * @param string $from_email
     * @param string $from_name
     * @param string $to_email
     * @param string $reply_to
     * @param string $subject
     * @param string $message
     * @return boolean
     */
    public function send(
	$file_name,
	$view, 
	$from_email,
	$from_name,
	$to_email,
	$reply_to,
	$subject,
	$message
    ) {

	//Load the library
	$this->load->library(LIBRARY);

	$this->html2pdf->folder(FILE_DIRECTORY);
	$this->html2pdf->filename($file_name);
	$this->html2pdf->paper(SIZE, ORIENTATION);

	$this->html2pdf->html($view);

	//Check that the PDF was created before we send it
	if ($path = $this->html2pdf->create('save')) {

	    $this->load->library('email');
	    $this->email->from($from_email, $from_name);
	    $this->email->to($to_email);
	    $this->email->reply_to($reply_to);
	    $this->email->subject($subject);
	    $this->email->message($message);
	    $this->email->attach($path);

	    //returns bool
	    if ($this->email->send()) {
		$this->email->clear(true);
		unlink($path);
		return true;
	    } else {
		$this->email->clear(true);
		unlink($path);
		return false;
	    }
	}
    }
}
