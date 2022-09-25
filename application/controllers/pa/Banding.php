<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banding extends CI_Controller
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

    public function banding()
    {

        $data['judul'] = 'Perkara Banding';
        $data['perkara_banding'] = $this->banding->get_list_perkara();


        $this->load->view('pa/pa_header');
        $this->load->view('pa/pa_sidebar');
        $this->load->view('pa/pa_topbar', $data);
        $this->load->view('pa/banding', $data);
        $this->load->view('pa/pa_footer');
    }

    public function tambahperkara()
    {
        $data['judul'] = 'Perkara Banding';
        $data['perkara_banding'] = $this->banding->get_list_perkara();
        $data['perkara'] = $this->db->get('kategori_perkara')->result_array();

        //form validation

        $this->form_validation->set_rules('nomor_perkara', 'Nomor Perkara', 'required');
        $this->form_validation->set_rules('jns_perkara', 'Jenis Perkara', 'required');

        if ($this->form_validation->run() === FALSE) {
            # code...
            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/tambahperkara');
            $this->load->view('pa/pa_footer');
        } else {

            //ambil inputan nomor perkara
            $nomor_perkara = $this->input->post('nomor_perkara', true);
            $kode_perkara = $this->input->post('kode_perkara', true);
            $tahun_perkara = $this->input->post('tahun_perkara', true);
            $kode_pa = $this->input->post('kode_pa');
            //ambil inputan nomor surat pengantar
            $kode_surat_pa = $this->input->post('kode_surat_pa', true);
            $nomor_surat_pengantar = $this->input->post('nomor_surat_pengantar', true);
            $bulan_surat_pengantar = $this->input->post('bulan_surat_pengantar', true);
            $tahun_surat_pengantar = $this->input->post('tahun_surat_pengantar', true);
            //ambil  nama user
            $pengedit = $this->session->userdata('nama');
            $no_perkara_input = $nomor_perkara . '/' . $kode_perkara . '/' . $tahun_perkara . '/' . $kode_pa;
            $no_surat_pengantar_input = $kode_surat_pa . '/' . $nomor_surat_pengantar . '/' . 'HK.05/' . $bulan_surat_pengantar . '/' . $tahun_surat_pengantar;
            $data = [
                'id_perkara' => '',
                'id_user' => $this->session->userdata('id'),
                'no_perkara' => $no_perkara_input,
                'nm_pihak_penggugat' => $this->input->post('nm_pihak_penggugat', true),
                'nm_pihak_tergugat' => $this->input->post('nm_pihak_tergugat', true),
                'jns_perkara' => $this->input->post('jns_perkara', true),
                'tgl_register' => $this->input->post('tgl_register', true),
                'no_surat_pengantar' => $no_surat_pengantar_input,
                'pejabat_berwenang' => $this->input->post('pejabat_berwenang', true),
                'nm_pejabat' => $this->input->post('nm_pejabat', true),
                'nip_pejabat' => $this->input->post('nip_pejabat', true),
                'banyaknya' => $this->input->post('banyaknya', true),
                'keterangan' => $this->input->post('keterangan', true),
            ];
            //insert di database
            $this->db->insert('list_perkara', $data);
            //buat flashdata
            $this->session->set_flashdata('message', 'Data Perkara Baru, berhasil disimpan!');
            //catat audittrail
            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah menambah data perkara",
                'nama_log' => $pengedit
            );
            //simpan di db audittraiil
            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);

            //redirect ke banding
            redirect('pa/banding/banding');
        }
    }

    public function updateperkara($id_perkara)
    {

        $data['judul'] = 'Perkara Banding';
        //ambil data perkara
        $data['perkara'] = $this->db->get('kategori_perkara')->result_array();
        $data['list_perkara'] = $this->banding->get_list_perkara_byid($id_perkara);


        $this->form_validation->set_rules('nomor_perkara', 'Nomor Perkara', 'required');
        $this->form_validation->set_rules('jns_perkara', 'Jenis Perkara', 'required');

        if ($this->form_validation->run() === FALSE) {
            # code...
            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/updateperkara', $data);
            $this->load->view('pa/pa_footer');
        } else {
            //ambil inputan nomor perkara
            $nomor_perkara = $this->input->post('nomor_perkara', true);
            $kode_perkara = $this->input->post('kode_perkara', true);
            $tahun_perkara = $this->input->post('tahun_perkara', true);
            $kode_pa = $this->input->post('kode_pa');
            //ambil inputan nomor surat pengantar
            $kode_surat_pa = $this->input->post('kode_surat_pa');
            $nomor_surat_pengantar = $this->input->post('nomor_surat_pengantar', true);
            $bulan_surat_pengantar = $this->input->post('bulan_surat_pengantar', true);
            $tahun_surat_pengantar = $this->input->post('tahun_surat_pengantar', true);
            //ambil nama user
            $pengedit = $this->session->userdata('nama');


            $no_perkara_input = $nomor_perkara . '/' . $kode_perkara . '/' . $tahun_perkara . '/' . $kode_pa;
            $no_surat_pengantar_input = $kode_surat_pa . '/' . $nomor_surat_pengantar . '/' . 'HK.05/' . $bulan_surat_pengantar . '/' . $tahun_surat_pengantar;

            $id_perkara = $this->input->post('id_perkara', true);
            $nm_pihak_penggugat = $this->input->post('nm_pihak_penggugat', true);
            $nm_pihak_tergugat = $this->input->post('nm_pihak_tergugat', true);
            $jns_perkara = $this->input->post('jns_perkara', true);
            $pejabat_berwenang = $this->input->post('pejabat_berwenang', true);
            $nm_pejabat = $this->input->post('nm_pejabat', true);
            $nip_pejabat = $this->input->post('nip_pejabat', true);
            $banyaknya = $this->input->post('banyaknya', true);
            $keterangan = $this->input->post('keterangan', true);

            $data = [
                'id_perkara' => $id_perkara,
                'no_perkara' => $no_perkara_input,
                'nm_pihak_penggugat' => $nm_pihak_penggugat,
                'nm_pihak_tergugat' => $nm_pihak_tergugat,
                'jns_perkara' => $jns_perkara,
                'no_surat_pengantar' => $no_surat_pengantar_input,
                'pejabat_berwenang' => $pejabat_berwenang,
                'nm_pejabat' => $nm_pejabat,
                'nip_pejabat' => $nip_pejabat,
                'banyaknya' => $banyaknya,
                'keterangan' => $keterangan,
            ];

            $this->banding->UpdatePerkara($data, $id_perkara);
            $this->session->set_flashdata('message', 'Data Perkara Berhasil di Update !');

            $audittrail = array(
                'log_id' => '',
                'isi_log' => "User <b>" . $pengedit . "</b> telah update data perkara",
                'nama_log' => $pengedit
            );

            $this->db->set('rekam_log', 'NOW()', FALSE);
            $this->db->insert('log_audittrail', $audittrail);

            redirect('pa/banding/banding');
        }
    }
}
