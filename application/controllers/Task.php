<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once 'Apicall.php';

class Task extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // Load form helper
    //     $this->load->helper('form');
    //     // Load table library
    //     $this->load->library('table');
    // }
    public function index()
    {
        $api = new Apicall;
        $data['reddit'] = $api->reddit_api();
        // $data['time'] = $api->utc_converter();


        $this->load->library('table');


        $this->load->view('task', $data);
    }
    public function airport()
    {
        // $api = new Apicall;
        // $data['weather'] = $api->weather_api();
        // $data['time'] = $api->utc_converter();
        $this->load->view('task');
    }
}
