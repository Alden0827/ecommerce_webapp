<?php

// Error controller
// This controller is used to manage the errors (404)
class Errors extends CI_Controller 
{

    // Main controller for the contact form
    public function error404()
    {
        // Create your custom controller
        $this->load->view('page_404');
    }
}