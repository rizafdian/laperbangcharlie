<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakim extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("M_banding", "m_banding");

        if ($this->session->userdata('role_id') != 3) {
            redirect('auth');
        }
    }

    public function index()
    {

        //konten
        $data['judul'] = 'Dashboard';
        // $data['js'] = 'dashboard_hakim.js';
        $data['css'] = 'dashboard_hakim.css';
        $data['perkara_harian'] = $this->m_banding->countLapHarianHakim();
        $data['regis_harian'] = $this->m_banding->countRegis();
        $data['laper_masuk'] = $this->m_banding->count_laper_masuk();
        $data['laper_triwulan'] = $this->m_banding->count_laper_triwulan();
        $data['perkara_januari']    = $this->m_banding->perkara_januari()->num_rows();
        $data['perkara_februari']    = $this->m_banding->perkara_februari()->num_rows();
        $data['perkara_maret']    = $this->m_banding->perkara_maret()->num_rows();
        $data['perkara_april']    = $this->m_banding->perkara_april()->num_rows();
        $data['perkara_may']    = $this->m_banding->perkara_may()->num_rows();
        $data['perkara_juni']    = $this->m_banding->perkara_juni()->num_rows();
        $data['perkara_juli']    = $this->m_banding->perkara_juli()->num_rows();
        $data['perkara_agustus']    = $this->m_banding->perkara_agustus()->num_rows();
        $data['perkara_september']    = $this->m_banding->perkara_september()->num_rows();
        $data['perkara_oktober']    = $this->m_banding->perkara_oktober()->num_rows();
        $data['perkara_november']    = $this->m_banding->perkara_november()->num_rows();
        $data['perkara_desember']    = $this->m_banding->perkara_desember()->num_rows();

        $this->load->view('hakim/header', $data);
        $this->load->view('hakim/index');
        $this->load->view('hakim/footer', $data);
    }

    // public function getData()
    // {
    //     // $data = $this->m_banding->countBanding();
    //     $data['perkara_januari']    = $this->m_banding->perkara_januari()->num_rows();
    //     $data['perkara_februari']    = $this->m_banding->perkara_februari()->num_rows();
    //     $data['perkara_maret']    = $this->m_banding->perkara_maret()->num_rows();
    //     $data['perkara_april']    = $this->m_banding->perkara_april()->num_rows();
    //     $data['perkara_may']    = $this->m_banding->perkara_may()->num_rows();
    //     $data['perkara_juni']    = $this->m_banding->perkara_juni()->num_rows();
    //     $data['perkara_juli']    = $this->m_banding->perkara_juli()->num_rows();
    //     $data['perkara_agustus']    = $this->m_banding->perkara_agustus()->num_rows();
    //     $data['perkara_september']    = $this->m_banding->perkara_september()->num_rows();
    //     $data['perkara_oktober']    = $this->m_banding->perkara_oktober()->num_rows();
    //     $data['perkara_november']    = $this->m_banding->perkara_november()->num_rows();
    //     $data['perkara_desember']    = $this->m_banding->perkara_desember()->num_rows();

    //     echo json_encode($data);
    // }

    public function banding()
    {
        //konten
        $data['judul'] = 'Banding';
        $data['js'] = 'view_hakim_banding.js';
        $data['css'] = 'dashboard_hakim.css';


        $this->load->view('hakim/header', $data);
        $this->load->view('hakim/banding');
        $this->load->view('hakim/footer', $data);
    }

    public function view_berkas_banding($id)
    {
        $data['judul'] = 'Banding';
        $data['js'] = 'view_berkas_banding.js';
        $data['css'] = 'dashboard_hakim.css';


        $data['detail_berkas'] = $this->db->get_where('v_all_perkara', ['id_perkara' => $id])->result_object();
        $data['header'] = $this->db->get_where('v_header_perkara', ['id_perkara' => $id])->result_object();

        $this->load->view('hakim/header', $data);
        $this->load->view('hakim/view_berkas_banding', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function get_data_banding()
    {
        $data = $this->m_banding->DataBandingHakim();
        $result =  [
            'response' => 'success',
            'code' => 600,
            'data' => $data

        ];
        echo json_encode($result);
    }

    public function getUser()
    {
        $id_perkara = $this->input->post('perkara_id');
        $id_user = $this->session->userdata('id');
        $data['user_mh'] = $this->m_banding->UserHakim($id_user);
        $data['pmh'] = $this->db->get_where('pmh', ['id_perkara' => $id_perkara])->row_array();
        echo json_encode($data);
    }

    public function get_catatan()
    {

        $id = $this->input->post('id_perkara');
        $nm_berkas = $this->input->post('nm_berkas');



        $data = $this->db->get_where('v_c_hakim', ['id_perkara' => $id, 'nm_berkas' => $nm_berkas])->result();
        echo json_encode($data);
    }

    public function set_catatan()
    {

        $pengedit = $this->session->userdata('nama');

        $data = [
            'id_catatan' => '',
            'id_perkara' => $this->input->post('id_perkara'),
            'id_user' => $this->session->userdata('id'),
            'nm_berkas' => $this->input->post('nm_berkas'),
            'catatan' => $this->input->post('catatan'),
            'time' => date('d-m-Y H:i:s')
        ];

        $res = $this->db->insert('catatan_hakim_baru', $data);

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah memberikan catatan",
            'nama_log' => $pengedit
        );

        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        echo json_encode($res);
    }
}
