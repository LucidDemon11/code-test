<?php

class Home extends CI_Controller {

    public function index()
    {
        // Set the title for the page/tab
        $data= [
            'title' => 'Code Test for Dalton Haddock - Quiz'
        ];
        
        // Load the views
        $this->load->view('main/header', $data);
        $this->load->view('main/content', $data);
		$this->load->view('main/footer');
    }
}