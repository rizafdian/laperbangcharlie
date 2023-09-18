<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_pp extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_banding", "m_banding");
        //usir user yang ga punya session
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 4 && $this->session->userdata('role_id') != 5) {
            redirect('auth');
        }
    }

    public function index() {
        
        //konten
        $data['judul'] = 'Dashboard';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'dashboard_admin.js';

        //dashboard card
        $data_harian = $this->m_banding->countLapHarianHakim();
        $putus_harian = $this->m_banding->countPerkaraPutus_banding();
        $data['perkara'] = $this->db->get('kategori_perkara')->result_array();
        $data['data_harian'] = $data_harian;
        $data['putus_harian'] = $putus_harian;
        $data['sisa_harian'] = $data_harian - $putus_harian;

        //dashboard perkara banding
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

        //dashboard chart laporan perkara
        $data_mdo1 = $this->db->get_where('laporan_perkara', ['id_user' => "2", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo1)) {
            $data['jan_mdo'] = "0";
        } 
        else {
            $data_mdo1['mdo_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "3", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_mdo'] = date('d', strtotime($data_mdo1['mdo_jan'][0]['tgl_upload']));
        }
        $data_mdo2 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo2)) {
            $data['feb_mdo'] = "0";
        } 
        else {
            $data_mdo2['mdo_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_mdo'] = date('d', strtotime($data_mdo2['mdo_feb'][0]['tgl_upload']));
        }
        $data_mdo3 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo3)) {
            $data['mar_mdo'] = "0";
        } 
        else {
            $data_mdo3['mdo_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_mdo'] = date('d', strtotime($data_mdo3['mdo_mar'][0]['tgl_upload']));
        }
        $data_mdo4 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo4)) {
            $data['apr_mdo'] = "0";
        } 
        else {
            $data_mdo4['mdo_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_mdo'] = date('d', strtotime($data_mdo4['mdo_apr'][0]['tgl_upload']));
        }
        $data_mdo5 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo5)) {
            $data['mei_mdo'] = "0";
        } 
        else {
            $data_mdo5['mdo_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_mdo'] = date('d', strtotime($data_mdo5['mdo_mei'][0]['tgl_upload']));
        }
        $data_mdo6 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo6)) {
            $data['jun_mdo'] = "0";
        } 
        else {
            $data_mdo6['mdo_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_mdo'] = date('d', strtotime($data_mdo6['mdo_jun'][0]['tgl_upload']));
        }
        $data_mdo7 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo7)) {
            $data['jul_mdo'] = "0";
        } 
        else {
            $data_mdo7['mdo_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_mdo'] = date('d', strtotime($data_mdo7['mdo_jul'][0]['tgl_upload']));
        }
        $data_mdo8 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo8)) {
            $data['aug_mdo'] = "0";
        } 
        else {
            $data_mdo8['mdo_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_mdo'] = date('d', strtotime($data_mdo8['mdo_aug'][0]['tgl_upload']));
        }
        $data_mdo9 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo9)) {
            $data['sep_mdo'] = "0";
        } 
        else {
            $data_mdo9['mdo_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_mdo'] = date('d', strtotime($data_mdo9['mdo_sep'][0]['tgl_upload']));
        }
        $data_mdo10 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo10)) {
            $data['oct_mdo'] = "0";
        } 
        else {
            $data_mdo10['mdo_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_mdo'] = date('d', strtotime($data_mdo10['mdo_oct'][0]['tgl_upload']));
        }
        $data_mdo11 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo11)) {
            $data['nov_mdo'] = "0";
        } 
        else {
            $data_mdo11['mdo_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_mdo'] = date('d', strtotime($data_mdo11['mdo_nov'][0]['tgl_upload']));
        }
        $data_mdo12 = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_mdo12)) {
            $data['des_mdo'] = "0";
        } 
        else {
            $data_mdo12['mdo_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "2",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_mdo'] = date('d', strtotime($data_mdo12['mdo_des'][0]['tgl_upload']));
        }

        //data chart laporan perkara PA Tahuna
        $data_thn1 = $this->db->get_where('laporan_perkara', ['id_user' => "10", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn1)) {
            $data['jan_thn'] = "0";
        } 
        else {
            $data_thn1['thn_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "10", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_thn'] = date('d', strtotime($data_thn1['thn_jan'][0]['tgl_upload']));
        }
        $data_thn2 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn2)) {
            $data['feb_thn'] = "0";
        } 
        else {
            $data_thn2['thn_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_thn'] = date('d', strtotime($data_thn2['thn_feb'][0]['tgl_upload']));
        }
        $data_thn3 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn3)) {
            $data['mar_thn'] = "0";
        } 
        else {
            $data_thn3['thn_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_thn'] = date('d', strtotime($data_thn3['thn_mar'][0]['tgl_upload']));
        }
        $data_thn4 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn4)) {
            $data['apr_thn'] = "0";
        } 
        else {
            $data_thn4['thn_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_thn'] = date('d', strtotime($data_thn4['thn_apr'][0]['tgl_upload']));
        }
        $data_thn5 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn5)) {
            $data['mei_thn'] = "0";
        } 
        else {
            $data_thn5['thn_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_thn'] = date('d', strtotime($data_thn5['thn_mei'][0]['tgl_upload']));
        }
        $data_thn6 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn6)) {
            $data['jun_thn'] = "0";
        } 
        else {
            $data_thn6['thn_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_thn'] = date('d', strtotime($data_thn6['thn_jun'][0]['tgl_upload']));
        }
        $data_thn7 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn7)) {
            $data['jul_thn'] = "0";
        } 
        else {
            $data_thn7['thn_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_thn'] = date('d', strtotime($data_thn7['thn_jul'][0]['tgl_upload']));
        }
        $data_thn8 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn8)) {
            $data['aug_thn'] = "0";
        } 
        else {
            $data_thn8['thn_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_thn'] = date('d', strtotime($data_thn8['thn_aug'][0]['tgl_upload']));
        }
        $data_thn9 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn9)) {
            $data['sep_thn'] = "0";
        } 
        else {
            $data_thn9['thn_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_thn'] = date('d', strtotime($data_thn9['thn_sep'][0]['tgl_upload']));
        }
        $data_thn10 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn10)) {
            $data['oct_thn'] = "0";
        } 
        else {
            $data_thn10['thn_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_thn'] = date('d', strtotime($data_thn10['thn_oct'][0]['tgl_upload']));
        }
        $data_thn11 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn11)) {
            $data['nov_thn'] = "0";
        } 
        else {
            $data_thn11['thn_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_thn'] = date('d', strtotime($data_thn11['thn_nov'][0]['tgl_upload']));
        }
        $data_thn12 = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_thn12)) {
            $data['des_thn'] = "0";
        } 
        else {
            $data_thn12['thn_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "10",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_thn'] = date('d', strtotime($data_thn12['thn_des'][0]['tgl_upload']));
        }

       //data chart laporan perkara PA Tondano
       $data_tdo1 = $this->db->get_where('laporan_perkara', ['id_user' => "5", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo1)) {
           $data['jan_tdo'] = "0";
       } 
       else {
           $data_tdo1['tdo_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "5", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_tdo'] = date('d', strtotime($data_tdo1['tdo_jan'][0]['tgl_upload']));
       }
       $data_tdo2 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo2)) {
           $data['feb_tdo'] = "0";
       } 
       else {
           $data_tdo2['tdo_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_tdo'] = date('d', strtotime($data_tdo2['tdo_feb'][0]['tgl_upload']));
       }
       $data_tdo3 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo3)) {
           $data['mar_tdo'] = "0";
       } 
       else {
           $data_tdo3['tdo_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_tdo'] = date('d', strtotime($data_tdo3['tdo_mar'][0]['tgl_upload']));
       }
       $data_tdo4 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo4)) {
           $data['apr_tdo'] = "0";
       } 
       else {
           $data_tdo4['tdo_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_tdo'] = date('d', strtotime($data_tdo4['tdo_apr'][0]['tgl_upload']));
       }
       $data_tdo5 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo5)) {
           $data['mei_tdo'] = "0";
       } 
       else {
           $data_tdo5['tdo_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_tdo'] = date('d', strtotime($data_tdo5['tdo_mei'][0]['tgl_upload']));
       }
       $data_tdo6 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo6)) {
           $data['jun_tdo'] = "0";
       } 
       else {
           $data_tdo6['tdo_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_tdo'] = date('d', strtotime($data_tdo6['tdo_jun'][0]['tgl_upload']));
       }
       $data_tdo7 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo7)) {
           $data['jul_tdo'] = "0";
       } 
       else {
           $data_tdo7['tdo_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_tdo'] = date('d', strtotime($data_tdo7['tdo_jul'][0]['tgl_upload']));
       }
       $data_tdo8 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo8)) {
           $data['aug_tdo'] = "0";
       } 
       else {
           $data_tdo8['tdo_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_tdo'] = date('d', strtotime($data_tdo8['tdo_aug'][0]['tgl_upload']));
       }
       $data_tdo9 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo9)) {
           $data['sep_tdo'] = "0";
       } 
       else {
           $data_tdo9['tdo_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_tdo'] = date('d', strtotime($data_tdo9['tdo_sep'][0]['tgl_upload']));
       }
       $data_tdo10 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo10)) {
           $data['oct_tdo'] = "0";
       } 
       else {
           $data_tdo10['tdo_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_tdo'] = date('d', strtotime($data_tdo10['tdo_oct'][0]['tgl_upload']));
       }
       $data_tdo11 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo11)) {
           $data['nov_tdo'] = "0";
       } 
       else {
           $data_tdo11['tdo_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_tdo'] = date('d', strtotime($data_tdo11['tdo_nov'][0]['tgl_upload']));
       }
       $data_tdo12 = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tdo12)) {
           $data['des_tdo'] = "0";
       } 
       else {
           $data_tdo12['tdo_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "5",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_tdo'] = date('d', strtotime($data_tdo12['tdo_des'][0]['tgl_upload']));
       }

        //data chart laporan perkara PA Bitung
        $data_bt1 = $this->db->get_where('laporan_perkara', ['id_user' => "11", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt1)) {
            $data['jan_bt'] = "0";
        } 
        else {
            $data_bt1['bt_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "11", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_bt'] = date('d', strtotime($data_bt1['bt_jan'][0]['tgl_upload']));
        }
        $data_bt2 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt2)) {
            $data['feb_bt'] = "0";
        } 
        else {
            $data_bt2['bt_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_bt'] = date('d', strtotime($data_bt2['bt_feb'][0]['tgl_upload']));
        }
        $data_bt3 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt3)) {
            $data['mar_bt'] = "0";
        } 
        else {
            $data_bt3['bt_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_bt'] = date('d', strtotime($data_bt3['bt_mar'][0]['tgl_upload']));
        }
        $data_bt4 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt4)) {
            $data['apr_bt'] = "0";
        } 
        else {
            $data_bt4['bt_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_bt'] = date('d', strtotime($data_bt4['bt_apr'][0]['tgl_upload']));
        }
        $data_bt5 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt5)) {
            $data['mei_bt'] = "0";
        } 
        else {
            $data_bt5['bt_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_bt'] = date('d', strtotime($data_bt5['bt_mei'][0]['tgl_upload']));
        }
        $data_bt6 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt6)) {
            $data['jun_bt'] = "0";
        } 
        else {
            $data_bt6['bt_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_bt'] = date('d', strtotime($data_bt6['bt_jun'][0]['tgl_upload']));
        }
        $data_bt7 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt7)) {
            $data['jul_bt'] = "0";
        } 
        else {
            $data_bt7['bt_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_bt'] = date('d', strtotime($data_bt7['bt_jul'][0]['tgl_upload']));
        }
        $data_bt8 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt8)) {
            $data['aug_bt'] = "0";
        } 
        else {
            $data_bt8['bt_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_bt'] = date('d', strtotime($data_bt8['bt_aug'][0]['tgl_upload']));
        }
        $data_bt9 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt9)) {
            $data['sep_bt'] = "0";
        } 
        else {
            $data_bt9['bt_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_bt'] = date('d', strtotime($data_bt9['bt_sep'][0]['tgl_upload']));
        }
        $data_bt10 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt10)) {
            $data['oct_bt'] = "0";
        } 
        else {
            $data_bt10['bt_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_bt'] = date('d', strtotime($data_bt10['bt_oct'][0]['tgl_upload']));
        }
        $data_bt11 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt11)) {
            $data['nov_bt'] = "0";
        } 
        else {
            $data_bt11['bt_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_bt'] = date('d', strtotime($data_bt11['bt_nov'][0]['tgl_upload']));
        }
        $data_bt12 = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_bt12)) {
            $data['des_bt'] = "0";
        } 
        else {
            $data_bt12['bt_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "11",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_bt'] = date('d', strtotime($data_bt12['bt_des'][0]['tgl_upload']));
        }

         //data chart laporan perkara PA Amurang
       $data_amu1 = $this->db->get_where('laporan_perkara', ['id_user' => "8", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu1)) {
           $data['jan_amu'] = "0";
       } 
       else {
           $data_amu1['amu_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "8", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_amu'] = date('d', strtotime($data_amu1['amu_jan'][0]['tgl_upload']));
       }
       $data_amu2 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu2)) {
           $data['feb_amu'] = "0";
       } 
       else {
           $data_amu2['amu_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_amu'] = date('d', strtotime($data_amu2['amu_feb'][0]['tgl_upload']));
       }
       $data_amu3 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu3)) {
           $data['mar_amu'] = "0";
       } 
       else {
           $data_amu3['amu_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_amu'] = date('d', strtotime($data_amu3['amu_mar'][0]['tgl_upload']));
       }
       $data_amu4 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu4)) {
           $data['apr_amu'] = "0";
       } 
       else {
           $data_amu4['amu_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_amu'] = date('d', strtotime($data_amu4['amu_apr'][0]['tgl_upload']));
       }
       $data_amu5 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu5)) {
           $data['mei_amu'] = "0";
       } 
       else {
           $data_amu5['amu_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_amu'] = date('d', strtotime($data_amu5['amu_mei'][0]['tgl_upload']));
       }
       $data_amu6 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu6)) {
           $data['jun_amu'] = "0";
       } 
       else {
           $data_amu6['amu_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_amu'] = date('d', strtotime($data_amu6['amu_jun'][0]['tgl_upload']));
       }
       $data_amu7 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu7)) {
           $data['jul_amu'] = "0";
       } 
       else {
           $data_amu7['amu_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_amu'] = date('d', strtotime($data_amu7['amu_jul'][0]['tgl_upload']));
       }
       $data_amu8 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu8)) {
           $data['aug_amu'] = "0";
       } 
       else {
           $data_amu8['amu_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_amu'] = date('d', strtotime($data_amu8['amu_aug'][0]['tgl_upload']));
       }
       $data_amu9 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu9)) {
           $data['sep_amu'] = "0";
       } 
       else {
           $data_amu9['amu_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_amu'] = date('d', strtotime($data_tdo9['amu_sep'][0]['tgl_upload']));
       }
       $data_amu10 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu10)) {
           $data['oct_amu'] = "0";
       } 
       else {
           $data_amu10['amu_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_amu'] = date('d', strtotime($data_amu10['amu_oct'][0]['tgl_upload']));
       }
       $data_amu11 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu11)) {
           $data['nov_amu'] = "0";
       } 
       else {
           $data_amu11['amu_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_amu'] = date('d', strtotime($data_amu11['amu_nov'][0]['tgl_upload']));
       }
       $data_amu12 = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_amu12)) {
           $data['des_amu'] = "0";
       } 
       else {
           $data_amu12['amu_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "8",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_amu'] = date('d', strtotime($data_amu12['amu_des'][0]['tgl_upload']));
       }

        //data chart laporan perkara PA Kotamobagu
        $data_ktg1 = $this->db->get_where('laporan_perkara', ['id_user' => "9", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg1)) {
            $data['jan_ktg'] = "0";
        } 
        else {
            $data_ktg1['ktg_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "9", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_ktg'] = date('d', strtotime($data_ktg1['ktg_jan'][0]['tgl_upload']));
        }
        $data_ktg2 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg2)) {
            $data['feb_ktg'] = "0";
        } 
        else {
            $data_ktg2['ktg_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_ktg'] = date('d', strtotime($data_ktg2['ktg_feb'][0]['tgl_upload']));
        }
        $data_ktg3 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg3)) {
            $data['mar_ktg'] = "0";
        } 
        else {
            $data_ktg3['ktg_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_ktg'] = date('d', strtotime($data_tdo3['ktg_mar'][0]['tgl_upload']));
        }
        $data_ktg4 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg4)) {
            $data['apr_ktg'] = "0";
        } 
        else {
            $data_ktg4['ktg_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_ktg'] = date('d', strtotime($data_ktg4['ktg_apr'][0]['tgl_upload']));
        }
        $data_ktg5 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg5)) {
            $data['mei_ktg'] = "0";
        } 
        else {
            $data_ktg5['ktg_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_ktg'] = date('d', strtotime($data_ktg5['ktg_mei'][0]['tgl_upload']));
        }
        $data_ktg6 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg6)) {
            $data['jun_ktg'] = "0";
        } 
        else {
            $data_ktg6['ktg_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_ktg'] = date('d', strtotime($data_ktg6['ktg_jun'][0]['tgl_upload']));
        }
        $data_ktg7 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg7)) {
            $data['jul_ktg'] = "0";
        } 
        else {
            $data_ktg7['ktg_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_ktg'] = date('d', strtotime($data_ktg7['ktg_jul'][0]['tgl_upload']));
        }
        $data_ktg8 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg8)) {
            $data['aug_ktg'] = "0";
        } 
        else {
            $data_ktg8['ktg_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_ktg'] = date('d', strtotime($data_ktg8['ktg_aug'][0]['tgl_upload']));
        }
        $data_ktg9 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg9)) {
            $data['sep_ktg'] = "0";
        } 
        else {
            $data_ktg9['ktg_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_ktg'] = date('d', strtotime($data_ktg9['ktg_sep'][0]['tgl_upload']));
        }
        $data_ktg10 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg10)) {
            $data['oct_ktg'] = "0";
        } 
        else {
            $data_ktg10['ktg_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_ktg'] = date('d', strtotime($data_ktg10['ktg_oct'][0]['tgl_upload']));
        }
        $data_ktg11 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg11)) {
            $data['nov_ktg'] = "0";
        } 
        else {
            $data_ktg11['ktg_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_ktg'] = date('d', strtotime($data_ktg11['ktg_nov'][0]['tgl_upload']));
        }
        $data_ktg12 = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg12)) {
            $data['des_ktg'] = "0";
        } 
        else {
            $data_ktg12['ktg_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "9",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_ktg'] = date('d', strtotime($data_ktg12['ktg_des'][0]['tgl_upload']));
        }

         //data chart laporan perkara PA Lolak
       $data_lo1 = $this->db->get_where('laporan_perkara', ['id_user' => "6", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo1)) {
           $data['jan_lo'] = "0";
       } 
       else {
           $data_lo1['lo_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "6", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_lo'] = date('d', strtotime($data_lo1['lo_jan'][0]['tgl_upload']));
       }
       $data_lo2 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo2)) {
           $data['feb_lo'] = "0";
       } 
       else {
           $data_lo2['lo_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_lo'] = date('d', strtotime($data_lo2['lo_feb'][0]['tgl_upload']));
       }
       $data_lo3 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo3)) {
           $data['mar_lo'] = "0";
       } 
       else {
           $data_lo3['lo_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_lo'] = date('d', strtotime($data_lo3['lo_mar'][0]['tgl_upload']));
       }
       $data_lo4 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo4)) {
           $data['apr_lo'] = "0";
       } 
       else {
           $data_lo4['lo_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_lo'] = date('d', strtotime($data_lo4['lo_apr'][0]['tgl_upload']));
       }
       $data_lo5 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo5)) {
           $data['mei_lo'] = "0";
       } 
       else {
           $data_lo5['lo_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_lo'] = date('d', strtotime($data_lo5['lo_mei'][0]['tgl_upload']));
       }
       $data_lo6 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo6)) {
           $data['jun_lo'] = "0";
       } 
       else {
           $data_lo6['lo_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_lo'] = date('d', strtotime($data_lo6['lo_jun'][0]['tgl_upload']));
       }
       $data_lo7 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo7)) {
           $data['jul_lo'] = "0";
       } 
       else {
           $data_lo7['lo_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_lo'] = date('d', strtotime($data_lo7['lo_jul'][0]['tgl_upload']));
       }
       $data_lo8 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo8)) {
           $data['aug_lo'] = "0";
       } 
       else {
           $data_lo8['lo_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_lo'] = date('d', strtotime($data_lo8['lo_aug'][0]['tgl_upload']));
       }
       $data_lo9 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo9)) {
           $data['sep_lo'] = "0";
       } 
       else {
           $data_lo9['lo_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_lo'] = date('d', strtotime($data_lo9['lo_sep'][0]['tgl_upload']));
       }
       $data_lo10 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo10)) {
           $data['oct_lo'] = "0";
       } 
       else {
           $data_lo10['lo_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_lo'] = date('d', strtotime($data_lo10['lo_oct'][0]['tgl_upload']));
       }
       $data_lo11 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo11)) {
           $data['nov_lo'] = "0";
       } 
       else {
           $data_lo11['lo_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_lo'] = date('d', strtotime($data_lo11['lo_nov'][0]['tgl_upload']));
       }
       $data_lo12 = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_lo12)) {
           $data['des_lo'] = "0";
       } 
       else {
           $data_lo12['lo_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "6",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_lo'] = date('d', strtotime($data_lo12['lo_des'][0]['tgl_upload']));
       }

       //data chart laporan perkara PA Bolaang Uki
       $data_bol1 = $this->db->get_where('laporan_perkara', ['id_user' => "4", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol1)) {
           $data['jan_bol'] = "0";
       } 
       else {
           $data_bol['bol_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "4", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_bol'] = date('d', strtotime($data_bol['bol_jan'][0]['tgl_upload']));
       }
       $data_bol2 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol2)) {
           $data['feb_bol'] = "0";
       } 
       else {
           $data_bol2['bol_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_bol'] = date('d', strtotime($data_bol2['bol_feb'][0]['tgl_upload']));
       }
       $data_bol3 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol3)) {
           $data['mar_bol'] = "0";
       } 
       else {
           $data_bol3['bol_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_bol'] = date('d', strtotime($data_bol3['bol_mar'][0]['tgl_upload']));
       }
       $data_bol4 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol4)) {
           $data['apr_bol'] = "0";
       } 
       else {
           $data_bol4['bol_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_bol'] = date('d', strtotime($data_bol4['bol_apr'][0]['tgl_upload']));
       }
       $data_bol5 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol5)) {
           $data['mei_bol'] = "0";
       } 
       else {
           $data_bol5['bol_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_bol'] = date('d', strtotime($data_bol5['bol_mei'][0]['tgl_upload']));
       }
       $data_bol6 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol6)) {
           $data['jun_bol'] = "0";
       } 
       else {
           $data_bol6['bol_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_bol'] = date('d', strtotime($data_bol6['bol_jun'][0]['tgl_upload']));
       }
       $data_bol7 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol7)) {
           $data['jul_bol'] = "0";
       } 
       else {
           $data_bol7['bol_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_bol'] = date('d', strtotime($data_bol7['bol_jul'][0]['tgl_upload']));
       }
       $data_bol8 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol8)) {
           $data['aug_bol'] = "0";
       } 
       else {
           $data_bol8['bol_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_bol'] = date('d', strtotime($data_bol8['bol_aug'][0]['tgl_upload']));
       }
       $data_bol9 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol9)) {
           $data['sep_bol'] = "0";
       } 
       else {
           $data_bol9['bol_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_bol'] = date('d', strtotime($data_bol9['bol_sep'][0]['tgl_upload']));
       }
       $data_bol10 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol10)) {
           $data['oct_bol'] = "0";
       } 
       else {
           $data_bol10['bol_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_bol'] = date('d', strtotime($data_bol10['bol_oct'][0]['tgl_upload']));
       }
       $data_bol11 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol11)) {
           $data['nov_bol'] = "0";
       } 
       else {
           $data_bol11['bol_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_bol'] = date('d', strtotime($data_bol11['bol_nov'][0]['tgl_upload']));
       }
       $data_bol12 = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bol12)) {
           $data['des_bol'] = "0";
       } 
       else {
           $data_bol12['bol_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "4",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_bol'] = date('d', strtotime($data_bol12['bol_des'][0]['tgl_upload']));
       }

       //data chart laporan perkara PA Boroko
       $data_bor1 = $this->db->get_where('laporan_perkara', ['id_user' => "7", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor1)) {
           $data['jan_bor'] = "0";
       } 
       else {
           $data_bor['bor_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "7", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_bor'] = date('d', strtotime($data_bor['bor_jan'][0]['tgl_upload']));
       }
       $data_bor2 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor2)) {
           $data['feb_bor'] = "0";
       } 
       else {
           $data_bor2['bor_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_bor'] = date('d', strtotime($data_bor2['bor_feb'][0]['tgl_upload']));
       }
       $data_bor3 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor3)) {
           $data['mar_bor'] = "0";
       } 
       else {
           $data_bor3['bor_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_bor'] = date('d', strtotime($data_bor3['bor_mar'][0]['tgl_upload']));
       }
       $data_bor4 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor4)) {
           $data['apr_bor'] = "0";
       } 
       else {
           $data_bor4['bor_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_bor'] = date('d', strtotime($data_bor4['bor_apr'][0]['tgl_upload']));
       }
       $data_bor5 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor5)) {
           $data['mei_bor'] = "0";
       } 
       else {
           $data_bor5['bor_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_bor'] = date('d', strtotime($data_bor5['bor_mei'][0]['tgl_upload']));
       }
       $data_bor6 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor6)) {
           $data['jun_bor'] = "0";
       } 
       else {
           $data_bor6['bor_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_bor'] = date('d', strtotime($data_bor6['bor_jun'][0]['tgl_upload']));
       }
       $data_bor7 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor7)) {
           $data['jul_bor'] = "0";
       } 
       else {
           $data_bor7['bor_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_bor'] = date('d', strtotime($data_bor7['bor_jul'][0]['tgl_upload']));
       }
       $data_bor8 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor8)) {
           $data['aug_bor'] = "0";
       } 
       else {
           $data_bor8['bor_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_bor'] = date('d', strtotime($data_bor8['bor_aug'][0]['tgl_upload']));
       }
       $data_bor9 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor9)) {
           $data['sep_bor'] = "0";
       } 
       else {
           $data_bor9['bor_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_bor'] = date('d', strtotime($data_bor9['bor_sep'][0]['tgl_upload']));
       }
       $data_bor10 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor10)) {
           $data['oct_bor'] = "0";
       } 
       else {
           $data_bor10['bor_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_bor'] = date('d', strtotime($data_bor10['bor_oct'][0]['tgl_upload']));
       }
       $data_bor11 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor11)) {
           $data['nov_bor'] = "0";
       } 
       else {
           $data_bor11['bor_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_bor'] = date('d', strtotime($data_bor11['bor_nov'][0]['tgl_upload']));
       }
       $data_bor12 = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_bor12)) {
           $data['des_bor'] = "0";
       } 
       else {
           $data_bor12['bor_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "7",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_bor'] = date('d', strtotime($data_bor12['bor_des'][0]['tgl_upload']));
       }

       //data chart laporan perkara PA Tutuyan
       $data_tty1 = $this->db->get_where('laporan_perkara', ['id_user' => "3", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty1)) {
           $data['jan_tty'] = "0";
       } 
       else {
           $data_tty['tty_jan'] = $this->db->get_where('laporan_perkara', ['id_user' => "3", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jan_tty'] = date('d', strtotime($data_tty['tty_jan'][0]['tgl_upload']));
       }
       $data_tty2 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty2)) {
           $data['feb_tty'] = "0";
       } 
       else {
           $data_tty2['tty_feb'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['feb_tty'] = date('d', strtotime($data_tty2['tty_feb'][0]['tgl_upload']));
       }
       $data_tty3 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty3)) {
           $data['mar_tty'] = "0";
       } 
       else {
           $data_tty3['tty_mar'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mar_tty'] = date('d', strtotime($data_tty3['tty_mar'][0]['tgl_upload']));
       }
       $data_tty4 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty4)) {
           $data['apr_tty'] = "0";
       } 
       else {
           $data_tty4['tty_apr'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['apr_tty'] = date('d', strtotime($data_tty4['tty_apr'][0]['tgl_upload']));
       }
       $data_tty5 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty5)) {
           $data['mei_tty'] = "0";
       } 
       else {
           $data_tty5['tty_mei'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['mei_tty'] = date('d', strtotime($data_tty5['tty_mei'][0]['tgl_upload']));
       }
       $data_tty6 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty6)) {
           $data['jun_tty'] = "0";
       } 
       else {
           $data_tty6['tty_jun'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jun_tty'] = date('d', strtotime($data_tty6['tty_jun'][0]['tgl_upload']));
       }
       $data_tty7 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty7)) {
           $data['jul_tty'] = "0";
       } 
       else {
           $data_tty7['tty_jul'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['jul_tty'] = date('d', strtotime($data_tty7['tty_jul'][0]['tgl_upload']));
       }
       $data_tty8 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty8)) {
           $data['aug_tty'] = "0";
       } 
       else {
           $data_tty8['tty_aug'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['aug_tty'] = date('d', strtotime($data_tty8['tty_aug'][0]['tgl_upload']));
       }
       $data_tty9 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty9)) {
           $data['sep_tty'] = "0";
       } 
       else {
           $data_tty9['tty_sep'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['sep_tty'] = date('d', strtotime($data_tty9['tty_sep'][0]['tgl_upload']));
       }
       $data_tty10 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty10)) {
           $data['oct_tty'] = "0";
       } 
       else {
           $data_tty10['tty_oct'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['oct_tty'] = date('d', strtotime($data_tty10['tty_oct'][0]['tgl_upload']));
       }
       $data_tty11 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty11)) {
           $data['nov_tty'] = "0";
       } 
       else {
           $data_tty11['tty_nov'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['nov_tty'] = date('d', strtotime($data_tty11['tty_nov'][0]['tgl_upload']));
       }
       $data_tty12 = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
       if (empty ($data_tty12)) {
           $data['des_tty'] = "0";
       } 
       else {
           $data_bol12['tty_des'] = $this->db->get_where('laporan_perkara', ['id_user' => "3",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
           $data['des_tty'] = date('d', strtotime($data_tty12['tty_des'][0]['tgl_upload']));
       }

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/dashboard', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }
}