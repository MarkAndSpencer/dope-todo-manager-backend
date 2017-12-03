<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('homepage');
    }
}
