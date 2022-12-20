<?php

use PhpOffice\PhpWord\TemplateProcessor;

defined('BASEPATH') or exit('No direct script access allowed');



class SuratPengantar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //panggil library ciqrcode
        $this->load->library('ciqrcode');
    }

    public function downloadsurat($id)
    {

        //Ambil data dari database
        $datas = $this->db->get_where('list_perkara', ['id_perkara' => $id])->result_array();
        $data = $datas[0];
        $tanggal = $data['tgl_register'];
        $tanggalconvert = date('d-m-Y', strtotime($tanggal));

        //generate qrcode
        $params['data'] = base_url() . 'viewdata/viewqr/' . $id;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'files/qrcodeimg/qr_' . $id . '.png';
        $this->ciqrcode->generate($params);

        require_once APPPATH . 'libraries/vendor/autoload.php';
        //tentukan template yang mau digunakan, sesuaikan dengan ID PA yang masuk
        switch ($this->session->userdata('id')) {
            case '2':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_manado.docx');
                break;
            case '3':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_tty.docx');
                break;
            case '4':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_pablu.docx');
                break;
            case '5':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_tdo.docx');
                break;
            case '6':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_lolak.docx');
                break;
            case '7':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_brk.docx');
                break;
            case '8':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_amg.docx');
                break;
            case '9':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_ktg.docx');
                break;
            case '10':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_thn.docx');
                break;
            case '11':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_btng.docx');
                break;
            case '36':
                $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/templates/surat_template_per.docx');
                break;
        }

        //insert data di template processor
        $templateProcessor->setValue('tgl_register', $tanggalconvert);
        $templateProcessor->setValue('no_surat', $data['no_surat_pengantar']);
        $templateProcessor->setValue('no_perkara', $data['no_perkara']);
        $templateProcessor->setValue('banyaknya', $data['banyaknya']);
        $templateProcessor->setValue('keterangan', $data['keterangan']);
        $templateProcessor->setValue('pejabat_berwenang', $data['pejabat_berwenang']);
        $templateProcessor->setValue('nm_pejabat', $data['nm_pejabat']);
        $templateProcessor->setValue('nip_pejabat', $data['nip_pejabat']);


        $templateProcessor->setImageValue('qrcode', ['path' => FCPATH . 'files/qrcodeimg/qr_'  . $id . '.png', 'width' => '55pt', 'height' => '']);
        //tentukan nama file
        $filename = 'Surat Pengantar' . date('dmY') . '.docx';
        header('Content-Disposition: attachment; filename=' . $filename);
        $templateProcessor->saveAs("php://output");
    }
}
