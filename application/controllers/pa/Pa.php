<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pa extends CI_Controller
{

    //construct
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_banding', 'banding');

        //user jika user tidak punya sesssion
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    } //end consutruct

    //===========================

    public function index()
    {
        $data_harian = $this->banding->countLapHarian();
        $putus_harian = $this->banding->countPerkaraPutus();
        //konten
        $data['judul'] = 'Dashboard';
        //data in database
        $data['perkara'] = $this->db->get('kategori_perkara')->result_array();
        $data['data_harian'] = $data_harian;
        $data['putus_harian'] = $putus_harian;
        $data['sisa_harian'] = $data_harian - $putus_harian;

        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/dashboard', $data);
        $this->load->view('pa/pa_footer');
    }
}
