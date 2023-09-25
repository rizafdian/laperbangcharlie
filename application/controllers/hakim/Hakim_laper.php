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
        $data['judul'] = 'Laporan Perkara';
        $data['side_judul'] = 'Laporan Bulanan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_hakim_laper.js';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_all_data();
        $data['years'] = $this->m_laper->get_years_laper();

        // $this->load->view('hakim/header', $data);
        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/lapbulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function laper_search_year($year)
    {
        $data['judul'] = 'Laporan Perkara';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'view_hakim_laper.js';

        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_laper($year);
        $data['years'] = $this->m_laper->get_years_laper();

        // $this->load->view('hakim/header', $data);
        $this->load->view('hakim/sidebar', $data);
        $this->load->view('hakim/lapbulan', $data);
        $this->load->view('hakim/footer', $data);
    }

    public function view_document($id)
    {
        $data['judul'] = 'Laporan Perkara';
        $data['side_judul'] = 'Laporan Bulanan';
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

        $this->load->view('hakim/header', $data);
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

        $this->load->view('hakim/header', $data);
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

        $this->load->view('hakim/header', $data);
        $this->load->view('hakim/lapbulan', $data);
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

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/triwulan', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function triwulan_search_year($year)
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/triwulan', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function view_triwulan($id)
    {

        $data['judul'] = 'Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/triwulan_view', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function add_catatan_triwulan()
    {
        $id_triwulan = $this->input->post('id_triwulan');

        $data = [
            'id' => '',
            'id_triwulan' => $id_triwulan,
            'tgl_catatan' => date('Y-m-d H:i:s'),
            'catatan' => $this->input->post('catatan')
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

        $this->session->set_flashdata('msg', 'Berhasil memberikan catatan');

        redirect('pp/Pp_laper/triwulan');
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

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/rekaptriwulan', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function rekap_triwulan_year($year)
    {
        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';

        $data['js'] = 'status.js';
        $data['all'] = $this->m_laper->year_rekap_triwulan($year);
        $data['years'] = $this->m_laper->years_rekap_triwulan();

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/rekaptriwulan', $data);
        $this->load->view('panitera_pengganti/footer', $data);
    }

    public function view_rekap_tri($id)
    {

        $data['judul'] = 'Rekap Laporan Triwulan';
        $data['css'] = 'dashboard_admin.css';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('rekap_triwulan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();

        $this->load->view('panitera_pengganti/header', $data);
        $this->load->view('panitera_pengganti/view_rekaptriwulan', $data);
        $this->load->view('panitera_pengganti/footer', $data);
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

            $this->load->view('panitera_pengganti/header', $data);
            $this->load->view('errors/view_message');
            $this->load->view('panitera_pengganti/footer', $data);
        }
    }

    public function file_not_found()
    {
        $data['judul'] = '';
        $data['css'] = 'dashboard_admin.css';
        $this->session->set_flashdata('msg', 'Tidak ada File'); //kop pesannya
        $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "PDF/XLS" karena Tidak ada filenya. !'); //isi pesannya.

        $this->load->view('hakim/header', $data);
        $this->load->view('errors/view_message');
        $this->load->view('hakim/footer', $data);
    }
}