<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Apicall.php';

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
        $data['count'] = $api->count();
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

    public function count()
    {
        $api = new Apicall;
        $data['count'] = $api->count();
        // $data['time'] = $api->utc_converter();
        $this->load->view('task', $data);
    }
    public function xml_download()
    {
        include_once __DIR__ . '../../models/Task.php';

        // $api = new Apicall;
        // $data['weather'] = $api->weather_api();
        // $data['time'] = $api->utc_converter();

        $result = $this->load->model('task_model');
        $result = $result->load->method('count_analytics');
        // echo json_encode($result);
        $this->load->view('document_v', $result);
    }
}
