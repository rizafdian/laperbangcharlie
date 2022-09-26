<?php
defined('BASEPATH') or exit('No direct script access allowed');



class SuratPengantar extends CI_Controller
{

    public function index()
    {


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');
        $templateProcessor->setValue('Name', 'John Doe');
        $templateProcessor->setValue(array('City', 'Street'), array('Detroit', '12th Street'));

        header('Content-Disposition: attachment; filename=ujicoba.docx');
        // $pathToSave = 'path/to/save/file.ext';
        $templateProcessor->saveAs("php://output");

        //fungsi download dari sini
        // $file = 'tes.docx';
        // header("Content-Description: File Transfer");
        // header('Content-Disposition: attachment; filename="' . $file . '"');
        // header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        // header('Content-Transfer-Encoding: binary');
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Expires: 0');
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // $xmlWriter->save("php://output");
    }
}
