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
        $data['current_year'] = date('Y');
        $data1['current_month'] = date('M Y');
       
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
        $data['current_year'] = $year;
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

    public function zip_file($id)
    {
        $data['judul'] = '';

        $data['laporan'] = $this->db->get_where('v_user_laporan', ['id' => $id])->result_array();
        $satker = $this->session->userdata('kode_pa');
        $periode = $data['laporan'][0]['periode'];
        $folder = "$satker $periode";

        $path = "./files/laporan_perkara/$folder/revisi/";

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
        $id_user = $this->session->userdata('id');
        $data['judul'] = 'Laporan Perkara';

        //form validation rules
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        // $this->form_validation->set_rules('file1', 'File PDF', 'required');
        // $this->form_validation->set_rules('file2', 'File ZIP', 'required');

            $periode = $this->input->post('periode', true);
            $periode_tgl = date('M Y', strtotime($periode));
            $current_month = date('M Y');
            $next_month = date('M Y', strtotime('+1 month',strtotime($periode_tgl))) ;
            $tanggal = date('Y-m-d');
            $berkas = "Lap Per $periode_tgl";
            $satker = $this->session->userdata('kode_pa');
            $data['laporan'] = $this->db->get_where('laporan_perkara', ['id_user' => $id_user, 'periode' => $periode_tgl])->result_array();

        //form validation
        if ($this->form_validation->run() === FALSE) {
            # code...

            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/add_laporan_perkara', $data);
            $this->load->view('pa/pa_footer');

        } else if ($current_month == $next_month and empty($data['laporan'][0]['periode'])) {
            
            $folder = "$satker $periode_tgl";
            $status = "Belum Validasi";
            $path = "./files/laporan_perkara/$folder";

            if (!file_exists($path)) {
                mkdir($path);
            }



            $config['upload_path']          = "./files/laporan_perkara/$folder/";
            $config['allowed_types']        = 'pdf|xls|xlsx';
            $config['max_size']             = 25024;
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
                    // $error_upload = ['error' => $this->upload->display_errors()];
                    $this->session->set_flashdata('message', 'file Excel Error Upload');
                    redirect('pa/PA_laper/');
                }
            }

            $data = [
                'id' => '',
                'id_user' => $this->session->userdata('id'),
                'berkas_laporan' => $berkas,
                'tgl_upload' => $tanggal,
                'periode' => $periode_tgl,
                'laper_pdf' => $laper_pdf,
                'laper_xls' => $laper_xls,
                'status' => $status
            ];

            $this->db->insert('laporan_perkara', $data);

            $pengedit = $this->session->userdata('nama');

            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan laporan perkara periode <b>" . $periode_tgl . "</b>",
                'nama_log' => $pengedit
            );
            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);

            $this->session->set_flashdata('message', 'Tambah Laporan Perkara dan Upload File berhasil');
            redirect('pa/PA_laper/');
            
        } else {

            $this->session->set_flashdata('message', 'Tambah Laporan Perkara tidak berhasil karena sudah melewati batas waktu Penguploadan Laporan Perkara/Data Laporan Perkara sudah ada');
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
        $path = "./files/laporan_perkara/$folder/revisi";

        if (!file_exists($path)) {
            mkdir($path);
        }

        $config['upload_path']          = "./files/laporan_perkara/$folder/revisi/";
        $config['allowed_types']        = 'pdf|xls|xlsx';
        $config['max_size']             = 25024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file gagal');
                redirect('pa/PA_laper/');
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file gagal');
                redirect('pa/PA_laper/');
            }
        }

        $data = [
            'id' => '',
            'laper_id' => $laper_id,
            'rev_pdf' => $laper_pdf,
            'rev_xls' => $laper_xls
        ];


        $this->db->insert('revisi_laporan', $data);

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan revisi laporan perkara periode <b>" . $periode . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('message', 'Upload file berhasil');
        redirect('pa/PA_laper/');
    }

    //triwulan

    public function triwulan()
    {
        $data['judul'] = "Laporan Triwulan";
        $data['laporan'] = $this->m_laper->get_data_triwulan();
        $data['years'] = $this->m_laper->get_years_triwulan();
        $data['current_year'] = date('Y');

        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/triwulan', $data);
        $this->load->view('pa/pa_footer');
    }


    public function add_lap_triwulan()
    {
        // $year = '%Y';
        // $tahun = mdate($year);
        //karna fungsi mdate tidak dikenali maka diganti dengan fungsi date(Y) biasa
        $id_user = $this->session->userdata('id');
        $tahun = date('Y');
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

        $data['laporan'] = $this->db->get_where('laporan_triwulan', ['id_user' => $id_user, 'berkas_laporan' => $berkas_laporan, 'periode_tahun' => $tahun])->result_array();

        if (empty($data['laporan'][0]['id'])) {
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
    
            $pengedit = $this->session->userdata('nama');
    
            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan laporan triwulan <b>" . $berkas_laporan . "</b> <b>" . $tahun . "</b>",
                'nama_log' => $pengedit
            );
            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);
    
            $this->session->set_flashdata('message', 'Data Laporan Triwulan Berhasil Ditambahkan !');
            redirect('pa/PA_laper/triwulan');
        } else {
            $this->session->set_flashdata('message', 'Data Laporan Triwulan Sudah Ditambahkan !');
            redirect('pa/PA_laper/triwulan');
        }
        
    }


    public function addTriwulan($id)
    {
        $data['judul'] = 'Laporan Triwulan';
        // $data['js'] = '';
        $data['laporan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();


        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/add_triwulan', $data);
        $this->load->view('pa/pa_footer');
    }


    public function triwulan_search_year($year)
    {
        $data['judul'] = 'Laporan Triwulan';
        $data['nama_user'] = $this->m_laper->get_nama_user();
        $data['laporan'] = $this->m_laper->year_data_triwulan($year);
        $data['years'] = $this->m_laper->get_years_triwulan();
        $data['current_year'] = $year;

        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/triwulan', $data);
        $this->load->view('pa/pa_footer');
    }

    public function view_triwulan($id)
    {
        $data['judul'] = 'Laporan Triwulan';
        //$data['js'] = 'modalpdf.js'; //karena mo mengurangi penggunaan modal / js, berusaha mo PHP full. alasan keamanan;
        $data['triwulan'] = $this->db->get_where('v_triwulan_laporan', ['id' => $id])->result_array();
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id' => $id])->result_array();
        $data['catatan'] = $this->db->get('catatan_laporan')->result_array();


        //mengecek data ada atau kosong
        if (empty($data['laporan'][0]['id'])) { //jika data kosong
            //buat Flash  message
            $this->session->set_flashdata('msg', 'File Kosong');
            $this->session->set_flashdata('properties', 'Anda tidak bisa Melihat File, karena belum mengupload File Laporan Triwulan, Silahkan Upload Laporan Triwulan!');
            //kirim ke error ke view
            redirect('pa/errorview');
        } else { //jika file tidak kosong
            //tampilkan view triwulanview
            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/triwulanview', $data);
            $this->load->view('pa/pa_footer');
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
        $path = "./files/laporan_triwulan/$folder/$nm_laporan/";

        if (!file_exists($path)) {
            if (!mkdir($path, 0777, true)) {
                die('filed create directories');
            }
        }

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf|xls|xlsx';
        $config['max_size']             = 25024;
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file pdf gagal');
                redirect('pa/PA_laper/triwulan');
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file excel gagal');
                redirect('pa/PA_laper/triwulan');
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

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan laporan <b>" . $nm_laporan . "</b> triwulan <b>" . $triwulan . "</b> <b>" . $tahun . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('message', 'Upload file berhasil');
        redirect('pa/PA_laper/triwulan/');
    }


    public function zip_file_triwulan($id)
    {
        $data['laporan'] = $this->db->get_where('v_detail_triwulan', ['id_triwulan' => $id])->result_array();
        $satker = $this->session->userdata('kode_pa');
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
            $this->session->set_flashdata('msg', 'File Kosong');
            $this->session->set_flashdata('properties', 'Anda tidak bisa Mendowload File Zip, karena belum ada file revisi Triwulan!');
            //kirim ke error ke view
            redirect('pa/errorview');
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

        $path = "./files/laporan_triwulan/$folder/$nm_laporan/revisi/";

        if (!file_exists($path)) {
            if (!mkdir($path, 0777, true)) {
                die('filed create directories');
            }
        }

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf|xls|xlsx';
        $config['max_size']             = 25024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'])) {
            if ($this->upload->do_upload('file1')) {
                $laper_pdf = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file gagal');
                redirect('pa/PA_laper/triwulan/');
                // $error = array('error' => $this->upload->display_errors());
                // $this->load->view('banding/uploadbundle', $error);
            }
        }

        if (($_FILES['file2']['name'])) {
            if ($this->upload->do_upload('file2')) {
                $laper_xls = $this->upload->data("file_name");
            } else {
                $this->session->set_flashdata('message', 'Upload file gagal');
                redirect('pa/PA_laper/triwulan/');
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

        $pengedit = $this->session->userdata('nama');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan revisi laporan <b>" . $nm_laporan . "</b> triwulan <b>" . $periode . "</b> <b>" . $tahun . "</b>",
            'nama_log' => $pengedit
        );
        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        $this->session->set_flashdata('message', 'Upload file berhasil');
        redirect('pa/PA_laper/triwulan/');
    }
}
