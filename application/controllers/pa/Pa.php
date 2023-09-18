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

        //data chart laporan perkara PA Tutuyan
        $data['nama'] = $this->session->userdata('nama');
        $id = $this->session->userdata('id');
       
        $data_tty1 = $this->db->get_where('laporan_perkara', ['id_user' => $id, 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty1)) {
            $data['jan_mdo'] = "0";
        } 
        else {
            $data_tty['tty_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => $id, 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_mdo'] = date('d', strtotime($data_tty['tty_jan'][0]['tgl_upload']));
        }
        $data_tty2 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty2)) {
            $data['feb_mdo'] = "0";
        } 
        else {
            $data_tty2['tty_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_mdo'] = date('d', strtotime($data_tty2['tty_feb'][0]['tgl_upload']));
        }
        $data_tty3 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty3)) {
            $data['mar_mdo'] = "0";
        } 
        else {
            $data_tty3['tty_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_mdo'] = date('d', strtotime($data_tty3['tty_mar'][0]['tgl_upload']));
        }
        $data_tty4 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty4)) {
            $data['apr_mdo'] = "0";
        } 
        else {
            $data_tty4['tty_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_mdo'] = date('d', strtotime($data_tty4['tty_apr'][0]['tgl_upload']));
        }
        $data_tty5 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty5)) {
            $data['mei_mdo'] = "0";
        } 
        else {
            $data_tty5['tty_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_mdo'] = date('d', strtotime($data_tty5['tty_mei'][0]['tgl_upload']));
        }
        $data_tty6 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty6)) {
            $data['jun_mdo'] = "0";
        } 
        else {
            $data_tty6['tty_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_mdo'] = date('d', strtotime($data_tty6['tty_jun'][0]['tgl_upload']));
        }
        $data_tty7 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty7)) {
            $data['jul_mdo'] = "0";
        } 
        else {
            $data_tty7['tty_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_mdo'] = date('d', strtotime($data_tty7['tty_jul'][0]['tgl_upload']));
        }
        $data_tty8 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty8)) {
            $data['aug_mdo'] = "0";
        } 
        else {
            $data_tty8['tty_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_mdo'] = date('d', strtotime($data_tty8['tty_aug'][0]['tgl_upload']));
        }
        $data_tty9 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty9)) {
            $data['sep_mdo'] = "0";
        } 
        else {
            $data_tty9['tty_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_mdo'] = date('d', strtotime($data_tty9['tty_sep'][0]['tgl_upload']));
        }
        $data_tty10 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty10)) {
            $data['oct_mdo'] = "0";
        } 
        else {
            $data_tty10['tty_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_mdo'] = date('d', strtotime($data_tty10['tty_oct'][0]['tgl_upload']));
        }
        $data_tty11 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty11)) {
            $data['nov_mdo'] = "0";
        } 
        else {
            $data_tty11['tty_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_mdo'] = date('d', strtotime($data_tty11['tty_nov'][0]['tgl_upload']));
        }
        $data_tty12 = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_tty12)) {
            $data['des_mdo'] = "0";
        } 
        else {
            $data_bol12['tty_des'] = $this->db->get_where('laporan_perkara', ['id_user' => $id,'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_mdo'] = date('d', strtotime($data_tty12['tty_des'][0]['tgl_upload']));
        
        }

        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/dashboard', $data);
        $this->load->view('pa/pa_footer', $data);
        
    }
}
