<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userprofile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //usir user yang ga punya session
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['userprofile'] = $this->db->get_where('users', ['id' => $id])->result_array();
        $data['judul'] = 'User Profile';


        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('user/userprofile', $data);
        $this->load->view('pa/pa_footer');
    }

    public function get_profile()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('users', ['id' => $id])->result();
        echo json_encode($data);
    }
}
