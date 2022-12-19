<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitera_pengganti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //usir user yang ga punya session
        if (!$this->session->userdata('id')  || $this->session->userdata('role_id') != 5) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Panitera Pengganti';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_pp.js';

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/view_pp', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function get_data_banding()
    {
        $data = $this->m_banding->get_perkara_pp();
        $result =  [
            'response' => 'success',
            'code' => 600,
            'data' => $data

        ];
        echo json_encode($result);
    }

    public function view_berkas_admin($id)
    {
        //konten
        $data['judul'] = 'Panitera Pengganti';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_berkas_admin.js';

        $data['detail_berkas'] = $this->db->get_where('v_perkara_pp', ['id_perkara' => $id])->result_object();

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/view_berkas_admin', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }


    public function get_log_inbox()
    {

        $this->db->count_all_results('log_inbox');
        $data = $this->db->get_where('log_inbox', ['is_read' => 1])->result();
        $total = $this->db->count_all_results();
        $result =  [
            'response' => 'success',
            'code' => 600,
            'data' => $data,
            'total' => $total

        ];
        echo json_encode($result);
    }
    //--end

    //function saat klik log inbox
    public function click_log_inbox()
    {
        $id = $this->input->post('id');
        $update = [
            'is_read' => 2
        ];
        $this->db->where('id_log_inbox', $id);
        $data = $this->db->update('log_inbox', $update);
        echo json_encode($data);
    }
    //--end
}
