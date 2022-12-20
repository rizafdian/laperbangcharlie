<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Viewdata extends CI_Controller
{

	function viewqr($qrid)
	{
		//$detil_dok = $this->db->query("SELECT a.diinput_tanggal as tglinput, a.*, b.*, c.*, e.*, f.nama, f.nip, f.jabatan, f.pangkat_gol_ruang, f.tmt_cpns, e.jabatan_id as jabatan_kode FROM simpel_all_list as a, simpel_jenis_izin_cuti as b, ref_persetujuan as c, simpel_ref_jabatan as e, simpel_register_pegawai as f WHERE a.jenis_id=b.jenis_id AND a.status_id=c.persetujuan_id AND a.nip=f.nip AND f.jabatan=e.jabatan_id AND qrcode='" . $qrid . "'")->row();
		$detil_dok = $this->db->query("SELECT * FROM v_all_perkara WHERE id_perkara=$qrid")->row();
		$data['dok_id'] 			= $qrid;
		$data['nama']		        = $detil_dok->nama;
		$data['no_perkara']	    = $detil_dok->no_perkara;
		$data['no_surat_pengantar']		        = $detil_dok->no_surat_pengantar;
		$data['pejabat_berwenang']		= $detil_dok->pejabat_berwenang;
		$data['nm_pejabat']		= $detil_dok->nm_pejabat;
		$data['nip_pejabat']		= $detil_dok->nip_pejabat;
		$this->load->view('showid/detil_qrdok', $data);
	}
}
