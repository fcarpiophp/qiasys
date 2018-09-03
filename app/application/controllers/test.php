<?php
class test extends Ci_Controller 
{
	public function mod()
	{
		$data = array(
			'page_title' => 'XZYsadf',
		);
		$this->load->view('header', $data);
		$this->load->view('test/abc', $data);
		$this->load->view('footer');
	}
}
