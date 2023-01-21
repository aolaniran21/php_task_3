<?php defined('BASEPATH') or exit('No direct script access allowed');


class Task_model extends Manaknight_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert_analytics()
    {
        $click = trim(xss_clean($this->input->post('click')));
        $type = trim(xss_clean($this->input->post('type')));

        $browser = trim(xss_clean($this->input->post('browser')));
        $data = array(
            'widget_type' => $type,
            'browser' => $browser,
            'created_at' => now()
        );

        $this->db->insert('analytics', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function insert_file()
    {

        $image = trim(xss_clean($this->input->post('image')));

        $data = array(
            'image' => $image,
        );

        $this->db->insert('analytics', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function count_analytics()
    {
        $result = $this->db->select('count(id) as count')->from('analytics')->get()->row_array();
        if ($result) {
            $data['week'] = $result['count'];
        }


        return $data;
        // return $this->db->count_all('analytics');
    }
}
