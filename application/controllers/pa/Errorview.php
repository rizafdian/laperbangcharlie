<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errorview extends CI_Controller
{

    //construct
    function __construct()
    {
        parent::__construct();

        //user jika user tidak punya sesssion
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    } //end consutruct

    //===========================

    public function index()
    {

        $data['judul'] = 'Dashboard';
        //data in database

        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('errors/view_message');
        $this->load->view('pa/pa_footer');
    }
}
