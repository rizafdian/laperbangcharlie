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
        $data['js'] = 'status.js';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_laper($year);
        $data['years'] = $this->m_laper->get_years_laper();

        $this->load->view('templates/header');
        $this->load->view('templates/sideadmin');
        $this->load->view('admin_view/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_document($id)
    {
        $data['js'] = 'modalpdf.js';
        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get_where('catatan_laporan', ['laper_id' => $id])->result_array();

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/view_document', $data);
            $this->load->view('templates/footer', $data);
        }

        // $this->load->view('templates/header');
        // $this->load->view('templates/sideadmin');
        // $this->load->view('admin_view/view_document', $data);
        // $this->load->view('templates/footer', $data);
    }

    public function download_xls($id)
    {

        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        if ($data['laporan'][0]['laper_xls'] != null) {
            force_download("files_laporan/$folder/" . $data['laporan'][0]['laper_xls'], null);
        } else {
            $this->session->set_flashdata('msg', 'Belum ada laporan');
            redirect('Admin');
        }
    }

    public function add_catatan()
    {
        $id_laper = $this->input->post('id_laper');

        $data = [
            'id' => '',
            'laper_id' => $id_laper,
            'tgl_catatan' => date('Y-m-d'),
            'catatan' => $this->input->post('catatan')
        ];

        $this->db->insert('catatan_laporan', $data);
        $this->session->set_flashdata('flash', 'Berhasil memberikan catatan');

        redirect('Admin');
    }

    public function add_validasi()
    {

        $id_laper = $this->input->post('id_laper');

        $data = [
            'status' => $this->input->post('validasi')
        ];
        $where = array('id' => $id_laper);
        $this->db->update('laporan_perkara', $data, $where);
        $this->session->set_flashdata('flash', 'Validasi Laporan Berhasil');

        redirect('Admin');
    }

    public function zip_file($id)
    {

        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files_laporan/$folder/revisi/";

        if (file_exists($path)) {
            $this->zip->read_dir($path);

            // Download the file to your desktop
            $this->zip->download("$folder-revisi.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Revisi');
        }
    }

    public function triwulan()
    {
        $data['js'] = '';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_triwulan_admin();
        $data['years'] = $this->m_laper->get_years_triwulan();

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/triwulan', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function triwulan_search_year($year)
    {
        $data['js'] = 'status.js';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['all'] = $this->m_laper->get_year_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();

        $this->load->view('templates/header');
        $this->load->view('templates/sideadmin');
        $this->load->view('admin_view/triwulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_triwulan($id)
    {

        $coba = '2';
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();
        // var_dump($data);
        // die;

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/triwulan_view', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function download_xls_triwulan($id)
    {
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id_triwulan' => $id])->result_array();

        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['berkas_laporan'];
        $tahun = $data['laporan'][0]['periode_tahun'];
        $nm_laporan = $data['laporan'][0]['nm_laporan'];
        $folder = "$satker $periode $tahun";



        if ($data['laporan'][0]['lap_xls'] != null) {
            force_download("laporan_triwulan/$folder/$nm_laporan/" . $data['laporan'][0]['lap_xls'], null);
        } else {
            $this->session->set_flashdata('msg', 'Belum ada laporan');
        }
    }

    public function zip_file_triwulan($id)
    {
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id_triwulan' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['berkas_laporan'];
        $tahun = $data['laporan'][0]['periode_tahun'];
        $nm_laporan = $data['laporan'][0]['nm_laporan'];
        $folder = "$satker $periode $tahun";

        $path = "./laporan_triwulan/$folder/$nm_laporan/revisi/";

        if (file_exists($path)) {
            $this->zip->read_dir($path);

            // Download the file to your desktop
            $this->zip->download("$folder-revisi.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Revisi');
            redirect('admin/triwulan');
        }
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
        $this->session->set_flashdata('flash', 'Berhasil memberikan catatan');

        redirect('Admin/triwulan');
    }

    public function add_validasi_triwulan()
    {

        $id_triwulan = $this->input->post('id_triwulan');

        $data = [
            'status_validasi' => $this->input->post('validasi')
        ];
        $where = array('id' => $id_triwulan);
        $this->db->update('lap_tri_detail', $data, $where);
        $this->session->set_flashdata('flash', 'Validasi Laporan Berhasil');

        redirect('Admin/triwulan/');
    }

    public function rekap_laporan()
    {
        $data['js'] = '';
        // $data['laporan'] = $this->db->get_where('v_rekap_laporan')->result_array();
        $data['all'] = $this->m_laper->get_all_rekap();
        $data['years'] = $this->m_laper->get_years_rekap();


        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/view_rekaplaper', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function rekap_search_year($year)
    {
        $data['js'] = 'status.js';
        $data['all'] = $this->m_laper->get_year_rekap($year);
        $data['years'] = $this->m_laper->get_years_rekap();

        $this->load->view('templates/header');
        $this->load->view('templates/sideadmin');
        $this->load->view('admin_view/view_rekaplaper', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_rekap_laporan()
    {
        $periode = $this->input->post('periode', true);
        $tanggal = date('Y-m-d');
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $periode";
        $path = "./files_laporan/$folder";

        if (!file_exists($path)) {
            mkdir($path);
        }



        $config['upload_path']          = "./files_laporan/$folder/";
        $config['allowed_types']        = 'pdf|xlsx';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $rekap_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('Admin/rekap_laporan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $rekap_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('Admin/rekap_laporan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        $data = [
            'id' => '',
            'id_user' => $this->session->userdata('id'),
            'tgl_upload' => $tanggal,
            'periode' => $periode,
            'rekap_pdf' => $rekap_pdf,
            'rekap_xls' => $rekap_xls
        ];

        $this->db->insert('rekap_laporan_perkara', $data);
        $this->session->set_flashdata('flash', 'Upload file berhasil');

        redirect('admin/rekap_laporan/');
    }

    // public function download_xls_rekap($id)
    // {
    //     $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();

    //     $satker = $data['laporan'][0]['kode_pa'];
    //     $periode = $data['laporan'][0]['periode'];
    //     $folder = "$satker $periode";

    //     if ($data['laporan'][0]['rekap_xls'] != null) {
    //         force_download("files_laporan/$folder/" . $data['laporan'][0]['rekap_xls'], null);
    //     } else {
    //         $this->session->set_flashdata('msg', 'Belum ada laporan');
    //     }
    // }

    public function zip_file_rekap($id)
    {
        $data['laporan'] = $this->db->get_where('v_rekap_laporan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files_laporan/$folder/";

        if (file_exists($path)) {
            $this->zip->read_dir($path);

            // Download the file to your desktop
            $this->zip->download("$folder.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Laporan');
        }
    }

    public function rekap_triwulan()
    {
        $data['js'] = '';
        $data['all'] = $this->m_laper->get_rekap_triwulan();
        $data['years'] = $this->m_laper->years_rekap_triwulan();

        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/rekaptriwulan', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function rekap_triwulan_year($year)
    {

        $data['js'] = 'status.js';
        $data['all'] = $this->m_laper->year_rekap_triwulan($year);
        $data['years'] = $this->m_laper->years_rekap_triwulan();

        $this->load->view('templates/header');
        $this->load->view('templates/sideadmin');
        $this->load->view('admin_view/rekaptriwulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_rekap_tri($id)
    {

        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('rekap_triwulan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();


        //user id tidak sesuai
        if ($this->session->userdata('role_id') != '1') {
            redirect('Admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sideadmin');
            $this->load->view('admin_view/view_rekaptriwulan', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function add_rekap_triwulan()
    {
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


        redirect('Admin/rekap_triwulan/');
    }

    public function lap_RekapTriwulan()
    {
        $triwulan = $this->input->post('berkas_laporan', true);
        $tahun = $this->input->post('tahun', true);
        $nm_laporan = $this->input->post('nm_laporan', true);
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $triwulan $tahun";
        $path = "./laporan_triwulan/$folder";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $path_triwulan = "$path/$nm_laporan";

        if (!file_exists($path_triwulan)) {
            mkdir($path_triwulan);
        }

        $config['upload_path']          = "./laporan_triwulan/$folder/$nm_laporan/";
        $config['allowed_types']        = 'pdf|xlsx';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file_pdf']['name'] != null)) {
            if ($this->upload->do_upload('file_pdf')) {
                $lap_pdf = $this->upload->data("file_name");
                $this->db->set('lap_pdf', $lap_pdf);
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('Admin/rekap_laporan/');
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
                redirect('Admin/rekap_laporan');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
            redirect('Admin/rekap_triwulan');
        }

        $id_rekap_tri = $this->input->post('id_triwulan', true);
        $tgl_kirim = date('Y-m-d');
        $this->db->set('tgl_kirim', $tgl_kirim);

        $this->db->where('id', $id_rekap_tri);
        $this->db->update('rekap_tri_detail');

        $this->session->set_flashdata('flash', 'Upload file berhasil');

        redirect('Admin/rekap_triwulan/');
    }

    public function download_xls_rekap_tri($id)
    {
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id_triwulan' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $triwulan = $data['laporan'][0]['berkas_laporan'];
        $periode = $data['laporan'][0]['periode_tahun'];
        $nm_laporan = $data['laporan'][0]['nm_laporan'];
        $folder = "$satker $triwulan $periode";

        if ($data['laporan'][0]['lap_xls'] != null) {
            force_download("laporan_triwulan/$folder/$nm_laporan/" . $data['laporan'][0]['lap_xls'], null);
        } else {
            $this->session->set_flashdata('msg', 'Belum ada laporan');
        }
    }

    public function zip_rekap_triwulan($id)
    {
        $data['laporan'] = $this->db->get_where('v_rekap_triwulan', ['id' => $id])->result_array();
        $satker = $data['laporan'][0]['kode_pa'];
        $triwulan = $data['laporan'][0]['berkas_laporan'];
        $periode = $data['laporan'][0]['periode_tahun'];
        $folder = "$satker $triwulan $periode";

        $path = "./laporan_triwulan/$folder/";

        if (file_exists($path)) {
            $this->zip->read_dir($path);

            // Download the file to your desktop
            $this->zip->download("$folder.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Laporan');
        }
    }
}
