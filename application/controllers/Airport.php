<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Airport extends CI_Controller
{

    // public function get_years()
    // {
    //     if ($this->input->get('term')) {
    //         $custom_query = ' `airport` LIKE "%' .  $this->input->get('term', true)  . '%" ';
    //         $data_list = $this->load->database->select('year')->from('analytics')->where($custom_query)->get()->result_array();


    //         $response_list = array();
    //         foreach ($data_list as $d_key => $_data) {
    //             array_push($response_list, array('text' => $_data['year'], 'id' => $_data['year']));
    //         }

    //         $output['results'] = $response_list;
    //         echo json_encode($output);
    //         exit();
    //     }
    // }
}
