<?php defined('BASEPATH') or exit('No direct script access allowed');


class Task extends CI_Model
{
    public function insert_analytics()
    {
        $click = trim(xss_clean($this->input->post('click')));
        // $type = trim(xss_clean($this->input->post('type')));
        $browser = trim(xss_clean($this->input->post('browser')));
        $data = array(
            // 'widget_type' => $type,
            'browser' => $browser,
        );

        $this->db->insert('analytics', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
