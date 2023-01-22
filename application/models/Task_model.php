<?php
defined('BASEPATH') or exit('No direct script access allowed');

include __DIR__ . '/../../system/core/Model.php';
class Task_model extends CI_Model
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

        $image = trim($this->input->post('file'));

        $data = array(
            'file' => $image,
        );

        $this->db->insert('file', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function count_analytics()
    {
        $result = $this->db->select('count(id) as count')->from('analytics')->get()->row_array();
        // if ($result) {
        //     $data['week'] = $result['count'];
        // }

        // $query = $this->db->get('analytics', 10);
        // return $query->result();
        // return $data;
        return $this->db->select('*')->from('analytics')->count_all_results();
    }

    public function xml()
    {

        $data   = [];
        $this->db->select('*');
        $query  =    $this->db->get('analytics');
        $result    =    $query->result_array();
        if (isset($result)) {

            $data['xml']    =    $result;
        }
        if (isset($_POST['submit'])) {
            $query  =    $this->db->get('analytics');
            if ($query->num_rows() > 0) {

                $config = array($config = array(
                    'root'     => 'root',
                    'element'  => 'element',
                    'newline'  => "\n",
                    'tab'           => "\t"
                ));
                $data = $this->dbutil->xml_from_result($query, $config);
                $this->load->helper(['file', 'download']);
                write_file('download.xml', $data);
                force_download('download.xml', $data);
            }
        }
        return $data;
    }
}
