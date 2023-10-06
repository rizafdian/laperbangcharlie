<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakim_laper extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('zip');
        $this->load->model("M_laper", "m_laper");

        //usir user yang ga punya session
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 3) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_hakim_laper.js';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_all_data();
        $data['years'] = $this->m_laper->get_years_laper();
        $data['current_year'] = date('Y');

        // $this->load->view('hakim/header', $data);
        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/lapbulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function laper_search_year($year)
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_hakim_laper.js';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_laper($year);
        $data['years'] = $this->m_laper->get_years_laper();
        $data['current_year'] = $year;

        // $this->load->view('hakim/header', $data);
        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/lapbulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function view_document($id)
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get_where('catatan_laporan', ['laper_id' => $id])->result_array();

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '3') {
            redirect('hakim/Hakim_laper');
        } else {

            $this->load->view('hakim/sidebar', $data);
            $this->load->view('hakim/lapbulandetail', $data);
            $this->load->view('hakim/footer', $data);
        }
    }

    // public function add_catatan()
    // {
    //     $id_laper = $this->input->post('id_laper');
    //     $pengedit = $this->session->userdata('nama');

    //     $data = [
    //         'id' => '',
    //         'laper_id' => $id_laper,
    //         'tgl_catatan' => date('Y-m-d H:i:s'),
    //         'catatan' => $this->input->post('catatan')
    //     ];

    //     $this->db->insert('catatan_laporan', $data);

    //     $audittrail = array(
    //         'log_id' => '',
    //         'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan catatan pada id laporan perkara <b>" . $id_laper . "</b>",
    //         'nama_log' => $pengedit
    //     );

    //     $this->db->set('rekam_log', 'NOW()', FALSE);
    //     $this->db->insert('log_audittrail', $audittrail);

    //     $this->session->set_flashdata('message', 'Anda Berhasil memberikan catatan');

    //     redirect('pp/Pp_laper');
    // }

    // public function add_validasi()
    // {

    //     $id_laper = $this->input->post('id_laper');
    //     $pengedit = $this->session->userdata('nama');

    //     $data = [
    //         'status' => $this->input->post('validasi')
    //     ];
    //     $where = array('id' => $id_laper);
    //     $this->db->update('laporan_perkara', $data, $where);

    //     $audittrail = array(
    //         'log_id' => '',
    //         'isi_log' => "User <b>" . $pengedit . "</b> telah memberikan validasi pada id laporan perkara <b>" . $id_laper . "</b>",
    //         'nama_log' => $pengedit
    //     );
    //     $this->db->set('rekam_log', 'NOW()', FALSE);
    //     $this->db->insert('log_audittrail', $audittrail);

    //     $this->session->set_flashdata('message', 'Validasi Laporan Berhasil');

    //     redirect('pp/Pp_laper');
    // }

    public function zip_file($id)
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files/laporan_perkara/$folder/revisi/";

        if (file_exists($path)) {
            $this->zip->read_dir($path, false);

            // Download the file to your desktop
            $this->zip->download("$folder-revisi.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Revisi'); //kop pesannya
            $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena belum ada data Revisi !'); //isi pesannya.

            $this->load->view('hakim/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('hakim/footer', $data);
        }
    }

    public function rekap_laporan()
    {
        $data['judul'] = 'Rekap Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        // $data['laporan'] = $this->db->get_where('v_rekap_laporan')->result_array();
        $data['all'] = $this->m_laper->get_all_rekap();
        $data['years'] = $this->m_laper->get_years_rekap();
        $data['current_year'] = date('Y');

        //data chart laporan perkara PA Kotamobagu
        $data_ktg1 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg1)) {
            $data['jan_ktg'] = "0";
        } 
        else {
            $data_ktg1['ktg_jan'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jan_ktg'] = date('d', strtotime($data_ktg1['ktg_jan'][0]['tgl_upload']));
        }
        $data_ktg2 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg2)) {
            $data['feb_ktg'] = "0";
        } 
        else {
            $data_ktg2['ktg_feb'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['feb_ktg'] = date('d', strtotime($data_ktg2['ktg_feb'][0]['tgl_upload']));
        }
        $data_ktg3 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg3)) {
            $data['mar_ktg'] = "0";
        } 
        else {
            $data_ktg3['ktg_mar'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_ktg'] = date('d', strtotime($data_tdo3['ktg_mar'][0]['tgl_upload']));
        }
        $data_ktg4 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg4)) {
            $data['apr_ktg'] = "0";
        } 
        else {
            $data_ktg4['ktg_apr'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['apr_ktg'] = date('d', strtotime($data_ktg4['ktg_apr'][0]['tgl_upload']));
        }
        $data_ktg5 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg5)) {
            $data['mei_ktg'] = "0";
        } 
        else {
            $data_ktg5['ktg_mei'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mei_ktg'] = date('d', strtotime($data_ktg5['ktg_mei'][0]['tgl_upload']));
        }
        $data_ktg6 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg6)) {
            $data['jun_ktg'] = "0";
        } 
        else {
            $data_ktg6['ktg_jun'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_ktg'] = date('d', strtotime($data_ktg6['ktg_jun'][0]['tgl_upload']));
        }
        $data_ktg7 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg7)) {
            $data['jul_ktg'] = "0";
        } 
        else {
            $data_ktg7['ktg_jul'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jul_ktg'] = date('d', strtotime($data_ktg7['ktg_jul'][0]['tgl_upload']));
        }
        $data_ktg8 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg8)) {
            $data['aug_ktg'] = "0";
        } 
        else {
            $data_ktg8['ktg_aug'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['aug_ktg'] = date('d', strtotime($data_ktg8['ktg_aug'][0]['tgl_upload']));
        }
        $data_ktg9 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg9)) {
            $data['sep_ktg'] = "0";
        } 
        else {
            $data_ktg9['ktg_sep'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_ktg'] = date('d', strtotime($data_ktg9['ktg_sep'][0]['tgl_upload']));
        }
        $data_ktg10 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg10)) {
            $data['oct_ktg'] = "0";
        } 
        else {
            $data_ktg10['ktg_oct'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['oct_ktg'] = date('d', strtotime($data_ktg10['ktg_oct'][0]['tgl_upload']));
        }
        $data_ktg11 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg11)) {
            $data['nov_ktg'] = "0";
        } 
        else {
            $data_ktg11['ktg_nov'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['nov_ktg'] = date('d', strtotime($data_ktg11['ktg_nov'][0]['tgl_upload']));
        }
        $data_ktg12 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg12)) {
            $data['des_ktg'] = "0";
        } 
        else {
            $data_ktg12['ktg_des'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_ktg'] = date('d', strtotime($data_ktg12['ktg_des'][0]['tgl_upload']));
        }

        // $this->load->view('hakim/header', $data);
        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/view_rekaplaper', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function detail_rekap_laporan($id)
    {
        $data['judul'] = 'Rekap Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/view_Detailrekaplaper', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function rekap_search_year($year)
    {
        $data['judul'] = 'Rekap Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_hakim_laper.js';

        $data['all'] = $this->m_laper->get_year_rekap($year);
        $data['years'] = $this->m_laper->get_years_rekap();
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['current_year'] = $year;

        //data chart laporan perkara PA Kotamobagu
        $data_ktg1 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg1)) {
            $data['jan_ktg'] = "0";
        } 
        else {
            $data_ktg1['ktg_jan'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1", 'Month(tgl_upload)' => "1", 'Year(tgl_upload)' => $year])->result_array();
            $data['jan_ktg'] = date('d', strtotime($data_ktg1['ktg_jan'][0]['tgl_upload']));
        }
        $data_ktg2 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg2)) {
            $data['feb_ktg'] = "0";
        } 
        else {
            $data_ktg2['ktg_feb'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "2", 'Year(tgl_upload)' => $year])->result_array();
            $data['feb_ktg'] = date('d', strtotime($data_ktg2['ktg_feb'][0]['tgl_upload']));
        }
        $data_ktg3 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg3)) {
            $data['mar_ktg'] = "0";
        } 
        else {
            $data_ktg3['ktg_mar'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => $year])->result_array();
            $data['mar_ktg'] = date('d', strtotime($data_tdo3['ktg_mar'][0]['tgl_upload']));
        }
        $data_ktg4 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg4)) {
            $data['apr_ktg'] = "0";
        } 
        else {
            $data_ktg4['ktg_apr'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "4", 'Year(tgl_upload)' => $year])->result_array();
            $data['apr_ktg'] = date('d', strtotime($data_ktg4['ktg_apr'][0]['tgl_upload']));
        }
        $data_ktg5 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg5)) {
            $data['mei_ktg'] = "0";
        } 
        else {
            $data_ktg5['ktg_mei'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "5", 'Year(tgl_upload)' => $year])->result_array();
            $data['mei_ktg'] = date('d', strtotime($data_ktg5['ktg_mei'][0]['tgl_upload']));
        }
        $data_ktg6 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg6)) {
            $data['jun_ktg'] = "0";
        } 
        else {
            $data_ktg6['ktg_jun'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => $year])->result_array();
            $data['jun_ktg'] = date('d', strtotime($data_ktg6['ktg_jun'][0]['tgl_upload']));
        }
        $data_ktg7 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg7)) {
            $data['jul_ktg'] = "0";
        } 
        else {
            $data_ktg7['ktg_jul'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "7", 'Year(tgl_upload)' => $year])->result_array();
            $data['jul_ktg'] = date('d', strtotime($data_ktg7['ktg_jul'][0]['tgl_upload']));
        }
        $data_ktg8 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg8)) {
            $data['aug_ktg'] = "0";
        } 
        else {
            $data_ktg8['ktg_aug'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "8", 'Year(tgl_upload)' => $year])->result_array();
            $data['aug_ktg'] = date('d', strtotime($data_ktg8['ktg_aug'][0]['tgl_upload']));
        }
        $data_ktg9 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg9)) {
            $data['sep_ktg'] = "0";
        } 
        else {
            $data_ktg9['ktg_sep'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => $year])->result_array();
            $data['sep_ktg'] = date('d', strtotime($data_ktg9['ktg_sep'][0]['tgl_upload']));
        }
        $data_ktg10 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg10)) {
            $data['oct_ktg'] = "0";
        } 
        else {
            $data_ktg10['ktg_oct'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "10", 'Year(tgl_upload)' => $year])->result_array();
            $data['oct_ktg'] = date('d', strtotime($data_ktg10['ktg_oct'][0]['tgl_upload']));
        }
        $data_ktg11 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg11)) {
            $data['nov_ktg'] = "0";
        } 
        else {
            $data_ktg11['ktg_nov'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "11", 'Year(tgl_upload)' => $year])->result_array();
            $data['nov_ktg'] = date('d', strtotime($data_ktg11['ktg_nov'][0]['tgl_upload']));
        }
        $data_ktg12 = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg12)) {
            $data['des_ktg'] = "0";
        } 
        else {
            $data_ktg12['ktg_des'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => $year])->result_array();
            $data['des_ktg'] = date('d', strtotime($data_ktg12['ktg_des'][0]['tgl_upload']));
        }

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/view_rekaplaper', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function zip_file_rekap($id)
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files/rekap_laporan_perkara/$folder/";

        if (file_exists($path)) {
            $this->zip->read_dir($path, false);

            // Download the file to your desktop
            $this->zip->download("$folder.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
            $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena Tidak ada filenya. !'); //isi pesannya.

            $this->load->view('panitera_pengganti/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('panitera_pengganti/footer', $data);
        }
    }

    public function triwulan()
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_triwulan_admin();
        $data['years'] = $this->m_laper->get_years_triwulan();
        $data['current_year'] = date('Y');

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/triwulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function triwulan_search_year($year)
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();
        $data['current_year'] = $year;

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/triwulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function view_triwulan($id)
    {

        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/triwulan_view', $data);
        $this->load->view('hakim/footer', $data);
    }

    // public function add_catatan_triwulan()
    // {
    //     $id_triwulan = $this->input->post('id_triwulan');

    //     $data = [
    //         'id' => '',
    //         'id_triwulan' => $id_triwulan,
    //         'tgl_catatan' => date('Y-m-d H:i:s'),
    //         'catatan' => $this->input->post('catatan')
    //     ];

    //     $this->db->insert('catatan_laporan', $data);

    //     $pengedit = $this->session->userdata('nama');

    //     $audittrail = array(
    //         'log_id' => '',
    //         'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan catatan pada id laporan triwulan <b>" . $id_triwulan . "</b>",
    //         'nama_log' => $pengedit
    //     );
    //     $this->db->set('rekam_log', 'NOW()', FALSE);
    //     $this->db->insert('log_audittrail', $audittrail);

    //     $this->session->set_flashdata('msg', 'Berhasil memberikan catatan');

    //     redirect('pp/Pp_laper/triwulan');
    // }

    public function zip_file_triwulan($id)
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id_triwulan' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['berkas_laporan'];
        $tahun = $data['laporan'][0]['periode_tahun'];
        $nm_laporan = $data['laporan'][0]['nm_laporan'];
        $folder = "$satker $periode $tahun";

        $path = "./files/laporan_triwulan/$folder/$nm_laporan/revisi/";

        if (file_exists($path)) {
            $this->zip->read_dir($path, false);

            // Download the file to your desktop
            $this->zip->download("$folder-revisi.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
            $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena Tidak ada File Revisi. !'); //isi pesannya.

            $this->load->view('panitera_pengganti/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('panitera_pengganti/footer', $data);
        }
    }

    public function add_validasi_triwulan()
    {

        $id_triwulan = $this->input->post('id_triwulan');

        $data = [
            'status_validasi' => $this->input->post('validasi')
        ];
        $where = array('id' => $id_triwulan);
        $this->db->update('lap_tri_detail', $data, $where);

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah memberikan validasi pada id laporan triwulan <b>" . $id_triwulan . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('msg', 'Validasi Laporan Berhasil');

        redirect('pp/Pp_laper/triwulan');
    }

    public function rekap_triwulan()
    {
        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['all'] = $this->m_laper->get_rekap_triwulan();
        $data['years'] = $this->m_laper->years_rekap_triwulan();
        $data['current_year'] = date('Y');

        //data chart laporan perkara PA Kotamobagu
        $data_ktg3 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg3)) {
            $data['mar_ktg'] = "0";
        } 
        else {
            $data_ktg3['ktg_mar'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['mar_ktg'] = date('d', strtotime($data_tdo3['ktg_mar'][0]['tgl_upload']));
        }
        $data_ktg6 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg6)) {
            $data['jun_ktg'] = "0";
        } 
        else {
            $data_ktg6['ktg_jun'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['jun_ktg'] = date('d', strtotime($data_ktg6['ktg_jun'][0]['tgl_upload']));
        }
        $data_ktg9 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg9)) {
            $data['sep_ktg'] = "0";
        } 
        else {
            $data_ktg9['ktg_sep'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['sep_ktg'] = date('d', strtotime($data_ktg9['ktg_sep'][0]['tgl_upload']));
        }
        $data_ktg12 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
        if (empty ($data_ktg12)) {
            $data['des_ktg'] = "0";
        } 
        else {
            $data_ktg12['ktg_des'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => date('Y')])->result_array();
            $data['des_ktg'] = date('d', strtotime($data_ktg12['ktg_des'][0]['tgl_upload']));
        }

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/rekaptriwulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function rekap_triwulan_year($year)
    {
        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';

        $data['js'] = 'status.js';
        $data['all'] = $this->m_laper->year_rekap_triwulan($year);
        $data['years'] = $this->m_laper->years_rekap_triwulan();
        $data['current_year'] = $year;

        //data chart laporan perkara PA Kotamobagu
        $data_ktg3 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg3)) {
            $data['mar_ktg'] = "0";
        } 
        else {
            $data_ktg3['ktg_mar'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "3", 'Year(tgl_upload)' => $year])->result_array();
            $data['mar_ktg'] = date('d', strtotime($data_tdo3['ktg_mar'][0]['tgl_upload']));
        }
        $data_ktg6 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg6)) {
            $data['jun_ktg'] = "0";
        } 
        else {
            $data_ktg6['ktg_jun'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "6", 'Year(tgl_upload)' => $year])->result_array();
            $data['jun_ktg'] = date('d', strtotime($data_ktg6['ktg_jun'][0]['tgl_upload']));
        }
        $data_ktg9 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg9)) {
            $data['sep_ktg'] = "0";
        } 
        else {
            $data_ktg9['ktg_sep'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "9", 'Year(tgl_upload)' => $year])->result_array();
            $data['sep_ktg'] = date('d', strtotime($data_ktg9['ktg_sep'][0]['tgl_upload']));
        }
        $data_ktg12 = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => $year])->result_array();
        if (empty ($data_ktg12)) {
            $data['des_ktg'] = "0";
        } 
        else {
            $data_ktg12['ktg_des'] = $this->db->get_where('rekap_triwulan', ['id_user' => "1",'Month(tgl_upload)' => "12", 'Year(tgl_upload)' => $year])->result_array();
            $data['des_ktg'] = date('d', strtotime($data_ktg12['ktg_des'][0]['tgl_upload']));
        }

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/rekaptriwulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function view_rekap_tri($id)
    {

        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('rekap_triwulan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/view_rekaptriwulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function zip_rekap_triwulan($id)
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $triwulan = $data['laporan'][0]['berkas_laporan'];
        $periode = $data['laporan'][0]['periode_tahun'];
        $folder = "$satker $triwulan $periode";

        $path = "./files/rekap_laporan_triwulan/$folder/";

        if (file_exists($path)) {
            $this->zip->read_dir($path, false);

            // Download the file to your desktop
            $this->zip->download("$folder.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
            $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena Tidak Laporan. !'); //isi pesannya.

            $this->load->view('hakim/sidebar', $data);
            $this->load->view('errors/view_message');
            $this->load->view('hakim/footer', $data);
        }
    }

    public function file_not_found()
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
        $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "PDF/XLS" karena Tidak ada filenya. !'); //isi pesannya.

        $this->load->view('hakim/sidebar', $data);
        $this->load->view('errors/view_message');
        $this->load->view('hakim/footer', $data);
    }
}