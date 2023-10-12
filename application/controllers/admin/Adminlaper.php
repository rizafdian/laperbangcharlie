<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlaper extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('zip');
        $this->load->model("M_laper", "m_laper");

        //usir user yang ga punya session
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_all_data();
        $data['years'] = $this->m_laper->get_years_laper();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/lapbulan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function laper_search_year($year)
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_laper($year);
        $data['years'] = $this->m_laper->get_years_laper();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/lapbulan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function view_document($id)
    {
        $data['judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get_where('catatan_laporan', ['laper_id' => $id])->result_array();

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('admin/Adminlaper');
        } else {

            $this->load->view('admin/header', $data);
            $this->load->view('admin/lapbulandetail', $data);
            $this->load->view('admin/footer', $data);
        }
    }

    public function add_catatan()
    {
        $id_laper = $this->input->post('id_laper');
        $pengedit = $this->session->userdata('nama');
        $periode = $this->input->post('periode');
        $catatan = $this->input->post('catatan');
        $status = $this->input->post('status');
        $target = $this->input->post('operator');

        $data = [
            'id' => '',
            'laper_id' => $id_laper,
            'tgl_catatan' => date('Y-m-d H:i:s'),
            'catatan' => $catatan
        ];

        $this->db->insert('catatan_laporan', $data);

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan catatan pada id laporan perkara <b>" . $id_laper . "</b>",
            'nama_log' => $pengedit
        );

        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        //API Notifikasi WA  
$token = "sAZJpFT7ntDM4+!gJ+h-";
$message = "Assamualaikum Wr Wb. 
Berikut informasi catatan laporan perkara periode " . $periode . "

1. " . $catatan . "
2. Dengan status saat ini: " . $status . "

Ini adalah sistem pemberitahuan otomatis Laporan Perkara di wilayah Pengadilan Tinggi Agama Manado.
*Sistem Informasi Layanan Perkara Banding (LAPERBANG)*
___________________________________
Ketik informasi untuk mengetahui perintah lainnya. 
*SIPEKA PTA Manado*";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,

        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $target,
        'message' => $message,
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $this->session->set_flashdata('message', 'Anda Berhasil memberikan catatan');

        redirect('admin/adminlaper');
    }

    public function add_validasi()
    {

        $id_laper = $this->input->post('id_laper');
        $pengedit = $this->session->userdata('nama');

        $data = [
            'status' => $this->input->post('validasi')
        ];
        $where = array('id' => $id_laper);
        $this->db->update('laporan_perkara', $data, $where);

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah memberikan validasi pada id laporan perkara <b>" . $id_laper . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('message', 'Validasi Laporan Berhasil');

        redirect('admin/adminlaper');
    }

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

            $this->load->view('admin/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('admin/footer', $data);
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


        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_rekaplaper', $data);
        $this->load->view('admin/footer', $data);
    }

    public function detail_rekap_laporan($id)
    {
        $data['judul'] = 'Rekap Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();

        // var_dump($data);
        // die;

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_Detailrekaplaper', $data);
        $this->load->view('admin/footer', $data);
    }

    public function rekap_search_year($year)
    {
        $data['judul'] = 'Rekap Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['all'] = $this->m_laper->get_year_rekap($year);
        $data['years'] = $this->m_laper->get_years_rekap();

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


        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_rekaplaper', $data);
        $this->load->view('admin/footer', $data);
    }

    public function add_rekap_laporan()
    {
        $id_user = $this->session->userdata('id');
        $periode = $this->input->post('periode', true);
        $periode_convert = date('M Y', strtotime($periode));
        $tanggal = date('Y-m-d');
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $periode_convert";
        $path = "./files/rekap_laporan_perkara/$folder";
        $data['laporan'] = $this->db->get_where('rekap_laporan_perkara', ['id_user' => $id_user, 'periode' => $periode_convert])->result_array();

        if (empty($data['laporan'][0]['periode'])) {
            if (!file_exists($path)) {
                mkdir($path);
            }
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'pdf|xls|xlsx';
            $config['max_size']             = 5024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if (($_FILES['file1']['name'])) {
                if ($this->upload->do_upload('file1')) {
                    $rekap_pdf = $this->upload->data("file_name");
                } else {
                    $this->session->set_flashdata('msg', 'Upload file gagal');
                    redirect('admin/adminlaper/rekap_laporan/');
                }
            }
    
            if (($_FILES['file2']['name'])) {
                if ($this->upload->do_upload('file2')) {
                    $rekap_xls = $this->upload->data("file_name");
                } else {
                    $this->session->set_flashdata('msg', 'Upload file gagal');
                    redirect('admin/adminlaper/rekap_laporan/');
                }
            }
    
            $data = [
                'id' => '',
                'id_user' => $this->session->userdata('id'),
                'tgl_upload' => $tanggal,
                'periode' => $periode_convert,
                'rekap_pdf' => $rekap_pdf,
                'rekap_xls' => $rekap_xls
            ];
    
            $this->db->insert('rekap_laporan_perkara', $data);
    
            $pengedit = $this->session->userdata('nama');
    
            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan rekap laporan perkara untuk periode <b>" . $periode_convert . "</b>",
                'nama_log' => $pengedit
            );
            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);
    
            $this->session->set_flashdata('msg', 'Upload file berhasil');
    
            redirect('admin/adminlaper/rekap_laporan/');
        } else {
            $this->session->set_flashdata('msg', 'Rekap laporan perkara periode ini sudah ditambahkan');
    
            redirect('admin/adminlaper/rekap_laporan/');
        }
    }

    public function edit_rekap_laporan()
    {
        $id_rekap = $this->input->post('id', true);
        $periode = $this->input->post('periode', true);
        $old_pdf = $this->input->post('old_pdf', true);
        $old_xls = $this->input->post('old_xls', true);
        $tanggal = date('Y-m-d');
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $periode";
        $path = "./files/rekap_laporan_perkara/$folder";
        $path_pdf = "./files/rekap_laporan_perkara/$folder/".$old_pdf;
        $path_xls = "./files/rekap_laporan_perkara/$folder/".$old_xls;

        if (!file_exists($path)) {
            mkdir($path);
        }
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf|xls|xlsx';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'] != null || $_FILES['file2']['name'] != null)) {
            if (($_FILES['file1']['name'])) {
                if ($this->upload->do_upload('file1')) {
                    $lap_pdf = $this->upload->data("file_name");
                    $this->db->set('rekap_pdf', $lap_pdf);
                    unlink($path_pdf);
                } else {
                    $this->session->set_flashdata('msg', 'Upload file gagal');
                    redirect('admin/adminlaper/rekap_laporan/');
                    
                }
            }

            if (($_FILES['file2']['name'])) {
                if ($this->upload->do_upload('file2')) {
                    $lap_xls = $this->upload->data("file_name");
                    $this->db->set('rekap_xls', $lap_xls);
                    unlink($path_xls);
                } else {
                    $this->session->set_flashdata('msg', 'Upload file gagal');
                    redirect('admin/adminlaper/rekap_laporan');
                    // $error = array('error' => $this->upload->display_errors());
                    // $this->load->view('banding/uploadbundle', $error);
                }
            }

        }else {
            $this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
            redirect('admin/adminlaper/rekap_laporan');
        }

        $data = [
            'tgl_upload' => $tanggal
        ];

        $this->db->where('id', $id_rekap);
        $this->db->update('rekap_laporan_perkara', $data);

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah melakukan update rekap laporan perkara untuk periode <b>" . $periode . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('msg', 'Upload file berhasil');

        redirect('admin/adminlaper/rekap_laporan/');
    }

    // public function zip_file_rekap($id)
    // {
    //     $data['judul'] = '';
    //     $data['css'] = 'dashboard_admin.css';
    //     $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();
    //     $satker = $data['laporan'][0]['kode_pa'];
    //     $periode = $data['laporan'][0]['periode'];
    //     $folder = "$satker $periode";

    //     $path = "./files/rekap_laporan_perkara/$folder/";

    //     if (file_exists($path)) {
    //         $this->zip->read_dir($path, false);

    //         // Download the file to your desktop
    //         $this->zip->download("$folder.zip");
    //     } else {
    //         $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
    //         $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena Tidak ada filenya. !'); //isi pesannya.

    //         $this->load->view('admin/header', $data);
    //         $this->load->view('errors/view_message');
    //         $this->load->view('admin/footer', $data);
    //     }
    // }

    public function triwulan()
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_triwulan_admin();
        $data['years'] = $this->m_laper->get_years_triwulan();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/triwulan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function triwulan_search_year($year)
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/triwulan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function view_triwulan($id)
    {

        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/triwulan_view', $data);
        $this->load->view('admin/footer', $data);
    }

    public function add_catatan_triwulan()
    {
        $id_triwulan = $this->input->post('id_triwulan');
        $periode_triwulan = $this->input->post('periode_triwulan');
        $periode_tahun = $this->input->post('periode_tahun');
        $status = $this->input->post('status_laporan');
        $catatan = $this->input->post('catatan');
        $target = $this->input->post('operator');

        $data = [
            'id' => '',
            'id_triwulan' => $id_triwulan,
            'tgl_catatan' => date('Y-m-d H:i:s'),
            'catatan' => $catatan
        ];

        $this->db->insert('catatan_laporan', $data);

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan catatan pada id laporan triwulan <b>" . $id_triwulan . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        //API Notifikasi WA  
$token = "sAZJpFT7ntDM4+!gJ+h-";
$message = "Assamualaikum Wr Wb. 
Berikut informasi catatan laporan perkara periode " . $periode_triwulan . " tahun " . $periode_tahun . " 

1. " . $catatan . "
2. Dengan status saat ini: " . $status . "

Ini adalah sistem pemberitahuan otomatis Laporan Perkara di wilayah Pengadilan Tinggi Agama Manado.
*Sistem Informasi Layanan Perkara Banding (LAPERBANG)*
___________________________________
Ketik informasi untuk mengetahui perintah lainnya. 
*SIPEKA PTA Manado*";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,

        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $target,
        'message' => $message,
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $this->session->set_flashdata('msg', 'Berhasil memberikan catatan');

        redirect('admin/adminlaper/triwulan');
    }

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

            $this->load->view('admin/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('admin/footer', $data);
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

        redirect('admin/adminlaper/triwulan');
    }

    public function rekap_triwulan()
    {
        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['all'] = $this->m_laper->get_rekap_triwulan();
        $data['years'] = $this->m_laper->years_rekap_triwulan();

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


        $this->load->view('admin/header', $data);
        $this->load->view('admin/rekaptriwulan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function rekap_triwulan_year($year)
    {
        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';

        $data['js'] = 'status.js';
        $data['all'] = $this->m_laper->year_rekap_triwulan($year);
        $data['years'] = $this->m_laper->years_rekap_triwulan();

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


        $this->load->view('admin/header', $data);
        $this->load->view('admin/rekaptriwulan', $data);
        $this->load->view('admin/footer', $data);
    }

    // public function v_add_rekap_triwulan(){
    //     $data['judul'] = 'Rekap Laporan Triwulan';
    //     $data['css'] = 'dashboard_admin.css';

    //     $this->load->view('admin/header', $data);
    //     $this->load->view('admin/view_Addrekaptriwulan', $data);
    //     $this->load->view('admin/footer', $data);
    // }

    public function add_rekap_triwulan()
    {
        $id_user = $this->session->userdata('id');
        $year = '%Y';
        $tahun = mdate($year);
        $periode_triwulan = $this->input->post('lap_triwulan');

        if ($periode_triwulan == "03") {
            $berkas_laporan = "Triwulan I";
        } elseif ($periode_triwulan == "06") {
            $berkas_laporan = "Triwulan II";
        } elseif ($periode_triwulan == "09") {
            $berkas_laporan = "Triwulan III";
        } else {
            $berkas_laporan = "Triwulan IV";
        }

        $data['laporan'] = $this->db->get_where('rekap_triwulan', ['id_user' => $id_user, 'berkas_laporan' => $berkas_laporan, 'periode_tahun' => $tahun])->result_array();

        if (empty($data['laporan'][0]['id'])) {
            $data = [
                'id' => '',
                'id_user' => $this->session->userdata('id'),
                'periode_triwulan' => $periode_triwulan,
                'periode_tahun' => $tahun,
                'tgl_upload' => date('Y-m-d'),
                'berkas_laporan' => $berkas_laporan
            ];
    
            $this->db->insert('rekap_triwulan', $data);
    
            $last_id = $this->db->insert_id();
            
    
            $keuangan = [
                'id' => '',
                'id_rekap_tri' => $last_id,
                'nm_laporan' => 'Keuangan',
            ];
            $this->db->insert('rekap_tri_detail', $keuangan);
    
            $meja_informasi = [
                'id' => '',
                'id_rekap_tri' => $last_id,
                'nm_laporan' => 'Meja Informasi',
            ];
            $this->db->insert('rekap_tri_detail', $meja_informasi);
    
            $pengaduan = [
                'id' => '',
                'id_rekap_tri' => $last_id,
                'nm_laporan' => 'Pengaduan',
            ];
            $this->db->insert('rekap_tri_detail', $pengaduan);
    
            $penilaian_banding = [
                'id' => '',
                'id_rekap_tri' => $last_id,
                'nm_laporan' => 'Penilaian Banding',
            ];
            $this->db->insert('rekap_tri_detail', $penilaian_banding);
    
            $pengedit = $this->session->userdata('nama');
    
            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan rekap laporan triwulan untuk periode <b>" . $periode_triwulan . "</b>",
                'nama_log' => $pengedit
            );
            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);
    
            $this->session->set_flashdata('msg', 'Triwulan berhasil ditambahkan');
            redirect('admin/adminlaper/rekap_triwulan/');
        } else {
            $this->session->set_flashdata('msg', 'Rekap laporan triwulan periode tersebut sudah ditambahkan');
            redirect('admin/adminlaper/rekap_triwulan/');
        }

        
    }

    public function view_rekap_tri($id)
    {

        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('rekap_triwulan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_rekaptriwulan', $data);
        $this->load->view('admin/footer', $data);
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

            $this->load->view('admin/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('admin/footer', $data);
        }
    }

    public function lap_RekapTriwulan()
    {
        $triwulan = $this->input->post('berkas_laporan', true);
        $tahun = $this->input->post('tahun', true);
        $nm_laporan = $this->input->post('nm_laporan', true);
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $triwulan $tahun";
        $path = "./files/rekap_laporan_triwulan/$folder";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $path_triwulan = "$path/$nm_laporan";

        if (!file_exists($path_triwulan)) {
            mkdir($path_triwulan);
        }

        $config['upload_path']          = $path_triwulan;
        $config['allowed_types']        = 'pdf|xls|xlsx';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file_pdf']['name'] != null)) {
            if ($this->upload->do_upload('file_pdf')) {
                $lap_pdf = $this->upload->data("file_name");
                $this->db->set('lap_pdf', $lap_pdf);
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('admin/adminlaper/rekap_triwulan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
            redirect('Admin/rekap_triwulan');
        }

        if (($_FILES['file_excel']['name'] != null)) {
            if ($this->upload->do_upload('file_excel')) {
                $lap_xls = $this->upload->data("file_name");
                $this->db->set('lap_xls', $lap_xls);
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('admin/adminlaper/rekap_triwualn');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
            redirect('admin/adminlaper/rekap_triwulan');
        }

        $id_rekap_tri = $this->input->post('id_triwulan', true);
        $tgl_kirim = date('Y-m-d');
        $this->db->set('tgl_kirim', $tgl_kirim);

        $this->db->where('id', $id_rekap_tri);
        $this->db->update('rekap_tri_detail');

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan rekap laporan triwulan <b>" . $nm_laporan . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('msg', 'Upload file berhasil');

        redirect('admin/adminlaper/rekap_triwulan/');
    }




    //=================================================================//

    public function file_not_found()
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
        $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "PDF/XLS" karena Tidak ada filenya. !'); //isi pesannya.

        $this->load->view('admin/header', $data);
        $this->load->view('errors/view_message');
        $this->load->view('admin/footer', $data);
    }
}
