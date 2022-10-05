<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PA_laper extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //download library, helper dan model
        $this->load->helper('download');
        $this->load->library('zip');
        $this->load->library('form_validation');
        $this->load->model('M_laper', 'm_laper');

        //usir user yang ga punya session
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    }

    public function index()
    {

        $data['judul'] = 'Laporan Perkara Bulanan';
        $data['laporan'] = $this->m_laper->get_data();
        $data['years'] = $this->m_laper->get_years();
        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/laporan_bulanan', $data);
        $this->load->view('pa/pa_footer');
    }

    public function laporan($year)
    {
        $data['judul'] = 'Laporan Perkara Bulanan';
        $data['js'] = 'status.js';
        $data['laporan'] = $this->m_laper->get_year($year);
        $data['years'] = $this->m_laper->get_years();
        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/laporan_bulanan', $data);
        $this->load->view('pa/pa_footer');
    }

    public function view_laporan($id)
    {

        $data['judul'] = 'Laporan Perkara Bulanan';
        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get_where('catatan_laporan', ['laper_id' => $id])->result_array();


        //user id tidak sesuai
        if ($this->session->userdata('id') != $data['laporan'][0]['id_user']) {
            redirect('PA_laper');
        } else {

            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/view_detil_bulanan', $data);
            $this->load->view('pa/pa_footer');
        }
    }

    public function download_xls($id)
    {

        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $this->session->userdata('kode_pa');
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";


        if ($data['laporan'][0]['laper_xls'] != null) {
            force_download("./files/files_laporan/$folder/" . $data['laporan'][0]['laper_xls'], null);
        } else {
            $this->session->set_flashdata('msg', 'Belum ada laporan');
        }
    }

    public function zip_file($id)
    {
        $data['judul'] = '';

        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $this->session->userdata('kode_pa');
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files_laporan/$folder/revisi/";

        if (file_exists($path)) {
            $this->zip->read_dir($path);

            // Download the file to your desktop
            $this->zip->download("$folder-revisi.zip");
        } else {
            $this->session->set_flashdata('msg', 'Tidak ada Revisi'); //kop pesannya
            $this->session->set_flashdata('properties', 'Anda tidak bisa mendowload file "ZIP" karena belum ada data Revisi !'); //isi pesannya.
            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('errors/view_message');
            $this->load->view('pa/pa_footer');
        }
    }

    public function get_status()
    {
        // $id = $this->input->post('id');
        $data['laporan'] = $this->m_laper->get_data();
        $status = $data['laporan'][0]['status'];
        echo json_encode($status);
    }

    public function add_laporan_perkara()
    {
        $data['judul'] = 'Laporan Perkara';

        //form validation rules
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        // $this->form_validation->set_rules('file1', 'File PDF', 'required');
        // $this->form_validation->set_rules('file2', 'File ZIP', 'required');

        //form validation
        if ($this->form_validation->run() === FALSE) {
            # code...

            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/add_laporan_perkara', $data);
            $this->load->view('pa/pa_footer');
        } else {

            $periode = $this->input->post('periode', true);
            $tanggal = date('Y-m-d');
            $berkas = "Lap Per $periode";
            $satker = $this->session->userdata('kode_pa');
            $folder = "$satker $periode";
            $status = "Belum Validasi";
            $path = "./files/files_laporan/$folder";

            if (!file_exists($path)) {
                mkdir($path);
            }



            $config['upload_path']          = "./files/files_laporan/$folder/";
            $config['allowed_types']        = 'pdf|xls|xlsx';
            $config['max_size']             = 5024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (($_FILES['file1']['name'])) {
                if ($this->upload->do_upload('file1')) {
                    $laper_pdf = $this->upload->data("file_name");
                } else {
                    // $error_upload = ['error' => $this->upload->display_errors()];
                    $this->session->set_flashdata('message', 'file PDF Error Upload');
                    redirect('pa/PA_laper/');
                }
            }

            if (($_FILES['file2']['name'])) {
                if ($this->upload->do_upload('file2')) {
                    $laper_xls = $this->upload->data("file_name");
                } else {
                    $error_upload = ['error' => $this->upload->display_errors()];
                    $this->session->set_flashdata('message', 'file ZIP Error Upload');
                    redirect('pa/PA_laper/');
                }
            }

            $data = [
                'id' => '',
                'id_user' => $this->session->userdata('id'),
                'berkas_laporan' => $berkas,
                'tgl_upload' => $tanggal,
                'periode' => $periode,
                'laper_pdf' => $laper_pdf,
                'laper_xls' => $laper_xls,
                'status' => $status
            ];

            $this->db->insert('laporan_perkara', $data);
            $this->session->set_flashdata('message', 'Tambah Perkara dan Upload File berhasil');
            redirect('pa/PA_laper/');
        }
    }

    public function revisi_laporan_perkara()
    {

        $laper_id = $this->input->post('id', true);
        // $tanggal = date('Y-m-d');
        $periode = $this->input->post('periode', true);
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $periode";
        $path = "./files_laporan/$folder/revisi";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $config['upload_path']          = "./files_laporan/$folder/revisi/";
        $config['allowed_types']        = 'pdf|zip|xls';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        $data = [
            'id' => '',
            'laper_id' => $laper_id,
            'rev_pdf' => $laper_pdf,
            'rev_xls' => $laper_xls
        ];


        $this->db->insert('revisi_laporan', $data);

        $this->session->set_flashdata('flash', 'Upload file berhasil');
        redirect('PA_laper/');
    }

    public function triwulan()
    {
        $data['js'] = '';
        $data['laporan'] = $this->m_laper->get_data_triwulan();
        $data['years'] = $this->m_laper->get_years_triwulan();


        $this->load->view('templates/header');
        $this->load->view('templates/side');
        $this->load->view('PA/triwulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function triwulan_search_year($year)
    {
        $data['js'] = 'status.js';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['laporan'] = $this->m_laper->year_data_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();

        $this->load->view('templates/header');
        $this->load->view('templates/side');
        $this->load->view('PA/triwulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_lap_triwulan()
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
            'berkas_laporan' => $berkas_laporan,
            'status_laporan' => "Belum Validasi"
        ];

        $this->db->insert('laporan_triwulan', $data);

        redirect('PA_laper/triwulan/');
    }

    public function addTriwulan($id)
    {
        $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();


        $this->load->view('templates/header');
        $this->load->view('templates/side');
        $this->load->view('PA/add_triwulan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view_triwulan($id)
    {
        $data['js'] = 'modalpdf.js';
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();


        //user id tidak sesuai
        if ($this->session->userdata('id') != $data['laporan'][0]['id_user']) {
            redirect('PA_laper/triwulan');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/side');
            $this->load->view('PA/triwulanview', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function uploadLaporanTriwulan()
    {
        $id_lap_tri = $this->input->post('id', true);
        $tgl_kirim = date('Y-m-d');
        $triwulan = $this->input->post('berkas_laporan', true);
        $tahun = $this->input->post('tahun', true);
        $nm_laporan = $this->input->post('nm_laporan', true);
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $triwulan $tahun";
        $path = "./laporan_triwulan/$folder/$nm_laporan/";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $config['upload_path']          = "./laporan_triwulan/$folder/$nm_laporan/";
        $config['allowed_types']        = 'pdf|xls';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/triwulan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/triwulan');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        $data = [
            'id' => '',
            'id_lap_tri' => $id_lap_tri,
            'nm_laporan' => $nm_laporan,
            'lap_pdf' => $laper_pdf,
            'lap_xls' => $laper_xls,
            'tgl_kirim' => $tgl_kirim,
            'status_validasi' => "Belum Validasi"
        ];

        $this->db->insert('lap_tri_detail', $data);

        $this->session->set_flashdata('flash', 'Upload file berhasil');
        redirect('PA_laper/triwulan/');
    }

    public function download_xls_triwulan($id)
    {
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id_triwulan' => $id])->result_array();

        $satker = $this->session->userdata('kode_pa');
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
        $satker = $this->session->userdata('kode_pa');
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
        }
    }

    public function revisi_laporan_triwulan()
    {

        $triwulan_id = $this->input->post('id', true);
        $tanggal = date('Y-m-d');
        $periode = $this->input->post('berkas_laporan', true);
        $tahun = $this->input->post('periode_tahun', true);
        $nm_laporan = $this->input->post('nm_laporan', true);
        $satker = $this->session->userdata('kode_pa');
        $folder = "$satker $periode $tahun";

        $path = "./laporan_triwulan/$folder/$nm_laporan/revisi/";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $config['upload_path']          = "./laporan_triwulan/$folder/$nm_laporan/revisi/";
        $config['allowed_types']        = 'pdf|xls';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/triwulan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('msg', 'Upload file gagal');
                redirect('PA_laper/triwulan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        $data = [
            'rev_pdf' => $laper_pdf,
            'rev_xls' => $laper_xls,
            'tgl_revisi' => $tanggal
        ];

        $where = $this->db->where('id', $triwulan_id);
        $this->db->update('lap_tri_detail', $data, $where);

        $this->session->set_flashdata('flash', 'Upload file berhasil');
        redirect('PA_laper/triwulan/');
    }
}
