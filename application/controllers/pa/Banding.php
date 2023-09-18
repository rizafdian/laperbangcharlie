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
        $this->load->helper('download');

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
            $no_surat_pengantar_input = $kode_surat_pa . '/' . $nomor_surat_pengantar . '/' . 'HK2.6/' . $bulan_surat_pengantar . '/' . $tahun_surat_pengantar;
            $data = [
                'id_perkara' => '',
                'id_user' => $this->session->userdata('id'),
                'no_perkara' => $no_perkara_input,
                'nm_pihak_penggugat' => $this->input->post('nm_pihak_penggugat', true),
                'no_hp_penggugat' => $this->input->post('no_hp_penggugat', true),
                'nm_pihak_tergugat' => $this->input->post('nm_pihak_tergugat', true),
                'no_hp_tergugat' => $this->input->post('no_hp_tergugat', true),
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
            $no_surat_pengantar_input = $kode_surat_pa . '/' . $nomor_surat_pengantar . '/' . 'HK2.6/' . $bulan_surat_pengantar . '/' . $tahun_surat_pengantar;

            $id_perkara = $this->input->post('id_perkara', true);
            $nm_pihak_penggugat = $this->input->post('nm_pihak_penggugat', true);
            $no_hp_penggugat = $this->input->post('no_hp_penggugat', true);
            $nm_pihak_tergugat = $this->input->post('nm_pihak_tergugat', true);
            $no_hp_tergugat = $this->input->post('no_hp_tergugat', true);
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
                'no_hp_penggugat' => $no_hp_penggugat,
                'nm_pihak_tergugat' => $nm_pihak_tergugat,
                'no_hp_tergugat' => $no_hp_tergugat,
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

    public function uploadberkas($id)
    {

        $data['judul'] = 'Perkara Banding';
        //ambil data
        $data['perkara'] = $this->db->get_where('list_perkara', ['id_perkara' => $id])->result_array();

        //cek user data sesuai atau tidak
        if ($this->session->userdata('id') != $data['perkara'][0]['id_user']) {
            redirect('pa/banding/banding'); //jika tidak sesuai lempar kembali ke controller banding method banding
        } else {
            //jika user sesuai tampilkan view
            $this->load->view('pa/pa_header');
            $this->load->view('pa/pa_sidebar');
            $this->load->view('pa/pa_topbar', $data);
            $this->load->view('pa/uploadberkas');
            $this->load->view('pa/pa_footer');
        }
    }

    function pengantar_upload()
    {
        //ambil nama user
        $pengedit = $this->session->userdata('nama');

        //config Upload
        $config['upload_path']          = './files/SuratPengantar';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 5024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (($_FILES['file1']['name'] != null)) {
            if ($this->upload->do_upload('file1')) {
                $sp_perkara = $this->upload->data("file_name");
                $this->db->set('sp_perkara', $sp_perkara);
            } else {
                $this->session->set_flashdata('message', 'Upload file gagal, ekstensi file harus pdf dan ukuran tidak boleh lebih dari 5 mb !');
                redirect('pa/banding/banding');
            }
        } else {
            $this->session->set_flashdata('message', 'Tidak ada file yang di upload !');
            redirect('pa/banding/banding/');
        }

        $id_perkara = $this->input->post('id_perkara');
        $this->db->where('id_perkara', $id_perkara);
        $this->db->update('list_perkara');

        $this->session->set_flashdata('message', 'Surat Pengantar Berhasil di Upload !');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah upload surat pengantar pada id perkara <b>" . $id_perkara . "</b>",
            'nama_log' => $pengedit
        );

        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        redirect('pa/banding/banding');
    }

    function multiple_upload()
    {

        $pengedit = $this->session->userdata('nama');

        $config['upload_path']          = './files/bundle_a';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 80000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //untuk upload file 1 dan seterusnya.....

        if (($_FILES['file1']['name']) == null && ($_FILES['file2']['name']) == null && ($_FILES['file3']['name']) == null
            && ($_FILES['file4']['name']) == null && ($_FILES['file5']['name']) == null && ($_FILES['file6']['name']) == null && ($_FILES['file7']['name']) == null
            && ($_FILES['file8']['name']) == null && ($_FILES['file9']['name']) == null && ($_FILES['file10']['name']) == null && ($_FILES['file11']['name']) == null
            && ($_FILES['file12']['name']) == null && ($_FILES['file13']['name']) == null && ($_FILES['file14']['name']) == null && ($_FILES['file15']['name']) == null
            && ($_FILES['file16']['name']) == null && ($_FILES['file17']['name']) == null && ($_FILES['file18']['name']) == null
        ) {
            $this->session->set_flashdata('message', 'Tidak ada file yang di upload');
            redirect('banding/');
        } else {
            if (($_FILES['file1']['name'])) {
                if ($this->upload->do_upload('file1')) {
                    $suratgugatan = $this->upload->data("file_name");
                    $this->db->set('surat_gugatan', $suratgugatan);
                } else {
                    $this->session->set_flashdata('message', 'Upload Surat Gugatan gagal !');
                    redirect('pa/banding/banding/');
                }
            }

            if (($_FILES['file2']['name'])) {
                if ($this->upload->do_upload('file2')) {
                    $skbundlea = $this->upload->data("file_name");
                    $this->db->set('sk_bundelA', $skbundlea);
                } else {
                    $this->session->set_flashdata('message', 'Upload Surat kuasa dari kedua belah pihak gagal !');
                    redirect('pa/banding/banding/');
                }
            }

            if (($_FILES['file3']['name'])) {
                if ($this->upload->do_upload('file3')) {
                    $bukti_pemb_panjar = $this->upload->data("file_name");
                    $this->db->set('bukti_pemb_panjar', $bukti_pemb_panjar);
                } else {
                    $this->session->set_flashdata('message', 'Upload Bukti Pembayaran Panjar gagal !');
                    redirect('pa/banding/banding/');
                }
            }

            if (($_FILES['file4']['name'])) {
                if ($this->upload->do_upload('file4')) {
                    $majelis_hakim = $this->upload->data("file_name");
                    $this->db->set('majelis_hakim', $majelis_hakim);
                } else {
                    $this->session->set_flashdata('message', 'Upload Penetapan Majelis Hakim gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file5']['name'])) {
                if ($this->upload->do_upload('file5')) {
                    $penunjukan_pp = $this->upload->data("file_name");
                    $this->db->set('penunjukan_pp', $penunjukan_pp);
                } else {
                    $this->session->set_flashdata('message', 'Upload Penunjukan Panitera Pengganti gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file6']['name'])) {
                if ($this->upload->do_upload('file6')) {
                    $penunjukan_js = $this->upload->data("file_name");
                    $this->db->set('penunjukan_js', $penunjukan_js);
                } else {
                    $this->session->set_flashdata('message', 'Upload Penunjukan jurusita/Jurusita Pengganti gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file7']['name'])) {
                if ($this->upload->do_upload('file7')) {
                    $penetapan_hari_sidang = $this->upload->data("file_name");
                    $this->db->set('penetapan_hari_sidang', $penetapan_hari_sidang);
                } else {
                    $this->session->set_flashdata('message', 'Upload Penetapan hari sidang gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file8']['name'])) {
                if ($this->upload->do_upload('file8')) {
                    $relaas_panggilan = $this->upload->data("file_name");
                    $this->db->set('relaas_panggilan', $relaas_panggilan);
                } else {
                    $this->session->set_flashdata('message', 'Upload Relaas - relaas panggilan gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file9']['name'])) {
                if ($this->upload->do_upload('file9')) {
                    $ba_sidang = $this->upload->data("file_name");
                    $this->db->set('ba_sidang', $ba_sidang);
                } else {
                    $this->session->set_flashdata('message', 'Upload Berita acara sidang gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file10']['name'])) {
                if ($this->upload->do_upload('file10')) {
                    $penetapan_sita = $this->upload->data("file_name");
                    $this->db->set('penetapan_sita', $penetapan_sita);
                } else {
                    $this->session->set_flashdata('message', 'Upload Penetapan sita Conservatoir/Revindicatoir gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file11']['name'])) {
                if ($this->upload->do_upload('file11')) {
                    $ba_sita = $this->upload->data("file_name");
                    $this->db->set('ba_sita', $ba_sita);
                } else {
                    $this->session->set_flashdata('message', 'Upload Berita acara sita Conservatoir/Revindicatoir gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file12']['name'])) {
                if ($this->upload->do_upload('file12')) {
                    $lampiran_surat = $this->upload->data("file_name");
                    $this->db->set('lampiran_surat', $lampiran_surat);
                } else {
                    $this->session->set_flashdata('message', 'Upload Lampiran-lampiran surat yang diajukan oleh kedua belah pihak gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file13']['name'])) {
                if ($this->upload->do_upload('file13')) {
                    $surat_bukti_penggugat = $this->upload->data("file_name");
                    $this->db->set('surat_bukti_penggugat', $surat_bukti_penggugat);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Surat-surat bukti penggugat gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file14']['name'])) {
                if ($this->upload->do_upload('file14')) {
                    $surat_bukti_tergugat = $this->upload->data("file_name");
                    $this->db->set('surat_bukti_tergugat', $surat_bukti_tergugat);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Surat-surat bukti tergugat gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file15']['name'])) {
                if ($this->upload->do_upload('file15')) {
                    $tanggapan_bukti_tergugat = $this->upload->data("file_name");
                    $this->db->set('tanggapan_bukti_tergugat', $tanggapan_bukti_tergugat);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Tanggapan bukti-bukti tergugat dari penggugat gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file16']['name'])) {
                if ($this->upload->do_upload('file16')) {
                    $tanggapan_bukti_penggugat = $this->upload->data("file_name");
                    $this->db->set('tanggapan_bukti_penggugat', $tanggapan_bukti_penggugat);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Tanggapan bukti-bukti penggugat dari tergugat gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file17']['name'])) {
                if ($this->upload->do_upload('file17')) {
                    $gambar_situasi = $this->upload->data("file_name");
                    $this->db->set('gambar_situasi', $gambar_situasi);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Gambar situasi gagal !');
                    redirect('pa/banding/banding');
                }
            }

            if (($_FILES['file18']['name'])) {
                if ($this->upload->do_upload('file18')) {
                    $surat_lain = $this->upload->data("file_name");
                    $this->db->set('surat_lain', $surat_lain);
                } else {
                    $this->session->set_flashdata('message', 'Upload  Surat-surat lain gagal !');
                    redirect('pa/banding/banding');
                }
            }
        }


        $id_perkara = $this->input->post('id_perkara');
        $this->db->where('id_perkara', $id_perkara);
        $this->db->update('list_perkara');
        $this->session->set_flashdata('message', 'berhasil upload bundel A');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah upload berkas bundel A pada id perkara <b>" . $id_perkara . "</b>",
            'nama_log' => $pengedit
        );

        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        redirect('pa/banding/banding');
    }

    function multiple_uploadB()
    {

        $pengedit = $this->session->userdata('nama');

        $config['upload_path']          = "./files/bundle_b";
        $config['allowed_types']        = 'pdf|rtf';
        $config['max_size']             = 80024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //untuk upload file 1 dan seterusnya.....

        if (($_FILES['file1']['name']) == null && ($_FILES['file2']['name']) == null && ($_FILES['file3']['name']) == null && ($_FILES['file4']['name']) == null
            && ($_FILES['file5']['name']) == null && ($_FILES['file6']['name']) == null && ($_FILES['file7']['name']) == null && ($_FILES['file8']['name']) == null
            && ($_FILES['file9']['name']) == null && ($_FILES['file10']['name']) == null && ($_FILES['file11']['name']) == null && ($_FILES['file12']['name']) == null
            && ($_FILES['file13']['name']) == null && ($_FILES['file14']['name']) == null && ($_FILES['file15']['name']) == null && ($_FILES['file16']['name']) == null
            && ($_FILES['file17']['name']) == null && ($_FILES['file18']['name']) == null
        ) {
            $this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
            redirect('banding/');
        } else {
            if (($_FILES['file1']['name'])) {
                if ($this->upload->do_upload('file1')) {
                    $salinan_putusan_pa = $this->upload->data("file_name");
                    $this->db->set('salinan_putusan_pa', $salinan_putusan_pa);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Surat kuasa dari kedua belah pihak gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file2']['name'])) {
                if ($this->upload->do_upload('file2')) {
                    $skbundleb = $this->upload->data("file_name");
                    $this->db->set('sk_bundelb', $skbundleb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Surat kuasa dari kedua belah pihak gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file3']['name'])) {
                if ($this->upload->do_upload('file3')) {
                    $akta_banding = $this->upload->data("file_name");
                    $this->db->set('akta_banding', $akta_banding);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Akta banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file4']['name'])) {
                if ($this->upload->do_upload('file4')) {
                    $akta_penerimaan_mb = $this->upload->data("file_name");
                    $this->db->set('akta_penerimaan_mb', $akta_penerimaan_mb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Akta penerimaan memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file5']['name'])) {
                if ($this->upload->do_upload('file5')) {
                    $memori_banding = $this->upload->data("file_name");
                    $this->db->set('memori_banding', $memori_banding);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file6']['name'])) {
                if ($this->upload->do_upload('file6')) {
                    $akta_pemberitahuan_banding = $this->upload->data("file_name");
                    $this->db->set('akta_pemberitahuan_banding', $akta_pemberitahuan_banding);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Akta pemberitahuan banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file7']['name'])) {
                if ($this->upload->do_upload('file7')) {
                    $pemberitahuan_penyerahan_mb = $this->upload->data("file_name");
                    $this->db->set('pemberitahuan_penyerahan_mb', $pemberitahuan_penyerahan_mb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Pemberitahuan penyerahan memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file8']['name'])) {
                if ($this->upload->do_upload('file8')) {
                    $akta_penerimaankontra_mb = $this->upload->data("file_name");
                    $this->db->set('akta_penerimaankontra_mb', $akta_penerimaankontra_mb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Akta penerimaan kontra memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file9']['name'])) {
                if ($this->upload->do_upload('file9')) {
                    $kontra_mb = $this->upload->data("file_name");
                    $this->db->set('kontra_mb', $kontra_mb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Kontra memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file10']['name'])) {
                if ($this->upload->do_upload('file10')) {
                    $pemberitahuan_penyerahankontra_mb = $this->upload->data("file_name");
                    $this->db->set('pemberitahuan_penyerahankontra_mb', $pemberitahuan_penyerahankontra_mb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Pemberitahuan penyerahan kontra memori banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file11']['name'])) {
                if ($this->upload->do_upload('file11')) {
                    $relaas_periksa_berkas_pb = $this->upload->data("file_name");
                    $this->db->set('relaas_periksa_berkas_pb', $relaas_periksa_berkas_pb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Relaas pemberitahuan untuk memeriksa (Inzage) berkas perkara banding gagal');
                    redirect('banding/');
                }
            }
            if (($_FILES['file12']['name'])) {
                if ($this->upload->do_upload('file12')) {
                    $sk_khusus = $this->upload->data("file_name");
                    $this->db->set('sk_khusus', $sk_khusus);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Surat kuasa khusus gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file13']['name'])) {
                if ($this->upload->do_upload('file13')) {
                    $bukt_pengiriman_bpb = $this->upload->data("file_name");
                    $this->db->set('bukt_pengiriman_bpb', $bukt_pengiriman_bpb);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Bukti pengiriman biaya perkara banding gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file14']['name'])) {
                if ($this->upload->do_upload('file14')) {
                    $bukti_setor_bp_kasnegara = $this->upload->data("file_name");
                    $this->db->set('bukti_setor_bp_kasnegara', $bukti_setor_bp_kasnegara);
                } else {
                    $this->session->set_flashdata('msg', 'Upload data Bukti setor biaya pendaftaran ke kas negara gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file15']['name'])) {
                if ($this->upload->do_upload('file15')) {
                    $surat_lainnya_b = $this->upload->data("file_name");
                    $this->db->set('surat_lainnya_b', $surat_lainnya_b);
                } else {
                    $this->session->set_flashdata('msg', 'Upload surat lainnya gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file16']['name'])) {
                if ($this->upload->do_upload('file16')) {
                    $salinan_putusan_pa_rtf = $this->upload->data("file_name");
                    $this->db->set('salinan_putusan_pa_rtf', $salinan_putusan_pa_rtf);
                } else {
                    $this->session->set_flashdata('msg', 'Upload salinan putusan.rtf gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file17']['name'])) {
                if ($this->upload->do_upload('file17')) {
                    $memori_banding_rtf = $this->upload->data("file_name");
                    $this->db->set('memori_banding_rtf', $memori_banding_rtf);
                } else {
                    $this->session->set_flashdata('msg', 'Upload memori banding.rtf gagal');
                    redirect('banding/');
                }
            }

            if (($_FILES['file18']['name'])) {
                if ($this->upload->do_upload('file18')) {
                    $kontra_mb_rtf = $this->upload->data("file_name");
                    $this->db->set('kontra_mb_rtf', $kontra_mb_rtf);
                } else {
                    $this->session->set_flashdata('msg', 'Upload kontra memori banding.rtf gagal');
                    redirect('banding/');
                }
            }
        }

        $id_perkara = $this->input->post('id_perkara');
        $this->db->where('id_perkara', $id_perkara);
        $this->db->update('list_perkara');
        $this->session->set_flashdata('message', 'berhasil upload bundel B');

        $audittrail = array(
            'log_id' => '',
            'isi_log' => "User <b>" . $pengedit . "</b> telah upload berkas bundel B pada id perkara <b>" . $id_perkara . "</b>",
            'nama_log' => $pengedit
        );

        $this->db->set('rekam_log', 'NOW()', FALSE);
        $this->db->insert('log_audittrail', $audittrail);

        redirect('pa/banding/banding');
    }

    public function download_putusan($id)
    {
        $data['perkara'] = $this->db->get_where('list_perkara', ['id_perkara' => $id])->result_array();
        force_download('files/putusan/' . $data['perkara'][0]['putusan_banding'], NULL);

        if ($data['perkara'][0]['putusan_banding'] != null) {
            force_download('files/putusan/' . $data['perkara'][0]['putusan_banding'], NULL);
        } else {
            $this->session->set_flashdata('message', 'Belum ada file putusan');
            redirect('pa/banding/banding');
        }
    }
}
