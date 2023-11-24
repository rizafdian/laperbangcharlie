<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_banding", "m_banding");
		//usir user yang ga punya session
		if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 1) {
			redirect('auth');
		}
	}

	public function index()
	{

		//konten
		$data['judul'] = 'Dashboard';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'dashboard_admin.js';


		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer', $data);
	}

	public function inputNoper()
	{
		$data['judul'] = 'Input Nomor Perkara';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'inputnoper.js';
		$data['panitera'] = $this->db->get_where('users', ['role_id' => 5])->result_array();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/inputnoper', $data);
		$this->load->view('admin/footer', $data);
	}

	public function get_data_banding()
	{
		$data = $this->m_banding->DataBanding();
		$result =  [
			'response' => 'success',
			'code' => 600,
			'data' => $data

		];
		echo json_encode($result);
	}

	public function view_berkas_admin($id)
	{
		//konten
		$data['judul'] = 'Input Nomor Perkara';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'view_berkas_admin.js';

		$data['detail_berkas'] = $this->db->get_where('v_all_perkara', ['id_perkara' => $id])->result_object();
		$data['header'] = $this->db->get_where('v_header_perkara', ['id_perkara' => $id])->result_object();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_berkas_admin', $data);
		$this->load->view('admin/footer', $data);
	}

	public function users()
	{
		//konten
		$data['judul'] = 'Manajemen Users';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'manajemen_users.js';

		//get data users
		$data['users'] = $this->db->get('users')->result_object();


		$this->load->view('admin/header', $data);
		$this->load->view('admin/manajemen_users', $data);
		$this->load->view('admin/footer', $data);
	}

	public function majelis_Hakim()
	{
		//konten
		$data['judul'] = 'Majelis Hakim';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'majelis_hakim.js';

		//get data user
		$data['user_mh'] = $this->m_banding->tampil_user_hakim_aktif();

		// //get data users
		// $data['users'] = $this->db->get('users')->result_object();


		$this->load->view('admin/header', $data);
		$this->load->view('admin/majelis_hakim', $data);
		$this->load->view('admin/footer', $data);
	}

	public function add_majelis()
	{
		$pengedit = $this->session->userdata('nama');

		$id_mh = $this->input->post('id_mh');
		$id_user_mh = $this->input->post('id_user_mh');
		$majelis = $this->input->post('majelis');
		$data = [
			'id_mh' => $id_mh,
			'id_user_mh' => $id_user_mh,
			'majelis' => $majelis
		];
		$array = $this->db->insert('majelis_hakim', $data);

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan user majelis hakim <b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		json_encode($array);
	}

	public function get_user_mh()
	{
		$data = $this->m_banding->DataMH();
		$result =  [
			'response' => 'success',
			'code' => 600,
			'data' => $data

		];
		echo json_encode($result);
	}

	public function del_user_mh()
	{

		$pengedit = $this->session->userdata('nama');

		$id_mh = $this->input->post('id_mh');
		// var_dump($id_mh);
		// die;
		$this->db->where('id_mh', $id_mh);
		$array = $this->db->delete('majelis_hakim');

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah menghapus user majelis hakim <b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		echo json_encode($array);
	}


	public function get_data_user()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('users', ['id' => $id])->result();
		echo json_encode($data);
	}

	public function updateUser()
	{

		$pengedit = $this->session->userdata('nama');

		$this->load->library('form_validation');
		$check_password = $this->input->post('password');

		if ($check_password != '') {
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
			$this->form_validation->set_rules('password_r', 'confirm password', 'matches[password]|min_length[6]');
		} else {
			$this->form_validation->set_rules('nama', 'nama', 'required');
		}
		if ($this->form_validation->run() == false) {

			$array = array(
				'error'   => true,
				'password_error' => form_error('password_r'),
			);
		} else {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password_r'), PASSWORD_DEFAULT);
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');
			if ($check_password != '') {
				$data = [
					'id' => $id,
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'role_id' => $role_id,
					'is_active' => $is_active
				];
			} else {
				$data = [
					'id' => $id,
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
					'role_id' => $role_id,
					'is_active' => $is_active
				];
			}


			$this->db->where('id', $id);
			$array = $this->db->update('users', $data);

			$audittrail = array(
				'log_id' => '',
				'isi_log' => "User <b>" . $pengedit . "</b> telah update data user pada id <b>" . $id . "</b>",
				'nama_log' => $pengedit
			);

			$this->db->set('rekam_log', 'NOW()', FALSE);
			$this->db->insert('log_audittrail', $audittrail);
		}


		echo json_encode($array);
	}

	public function addUser()
	{

		$pengedit = $this->session->userdata('nama');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
		$this->form_validation->set_rules('password_r', 'confirm password', 'matches[password]|required|min_length[6]');

		if ($this->form_validation->run() == false) {
			$array = array(
				'error'   => true,
				'username_error' => form_error('username'),
				'password_error' => form_error('password'),
				'password_r_error' => form_error('password_r'),
			);
		} else {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password_r'), PASSWORD_DEFAULT);
			$role_id = $this->input->post('role_id');
			$is_active = $this->input->post('is_active');


			$data = [
				'id' => $id,
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'role_id' => $role_id,
				'is_active' => $is_active,

			];
			$array = $this->db->insert('users', $data);

			$audittrail = array(
				'log_id' => '',
				'isi_log' => "User <b>" . $pengedit . "</b> telah menambahkan user <b>",
				'nama_log' => $pengedit
			);

			$this->db->set('rekam_log', 'NOW()', FALSE);
			$this->db->insert('log_audittrail', $audittrail);
		}
		echo json_encode($array);
	}

	public function del_user()
	{

		$pengedit = $this->session->userdata('nama');

		$id = $this->input->post('id');
		$array = $this->db->delete('users', array('id' => $id));

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah menghapus user <b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		echo json_encode($array);
	}

	public function updatenoper()
	{

		$pengedit = $this->session->userdata('nama');

		$no_perkara_banding = $this->input->post('nomor_perkara_banding');
		$tahun_perkara_banding = $this->input->post('tahun_perkara_banding');
		$nomor_perkara_fix = $no_perkara_banding . '/' . 'Pdt.G/' . $tahun_perkara_banding . '/PTA.Mdo';
		$id_perkara = $this->input->post('id_perkara');
		$tgl_reg_banding = $this->input->post('tgl_reg_banding');
		$data = [
			'id_perkara' => $id_perkara,
			'tgl_reg_banding' => $tgl_reg_banding,
			'no_perkara_banding' => $nomor_perkara_fix
		];

		$this->db->where('id_perkara', $id_perkara);
		$data =  $this->db->update('list_perkara', $data);

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah input nomor perkara banding pada id perkara <b>" . $id_perkara . "</b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		json_encode($data);
	}

	public function updateStatus()
	{

		$pengedit = $this->session->userdata('nama');

		$status_perkara = $this->input->post('status_perkara');
		$id_perkara = $this->input->post('id_perkara');
		$no_perkara = $this->input->post('no_perkara_banding');
		$tgl_reg_banding = $this->input->post('tgl_reg_banding');
		$target1 = $this->input->post('no_hp_penggugat');
		$target2 = $this->input->post('no_hp_tergugat');
		$target = $target1 . "," . $target2;

		$data = [
			'id_perkara' => $id_perkara,
			'status_perkara' => $status_perkara,
			'no_perkara_banding' => $no_perkara,
			'tgl_reg_banding' => $tgl_reg_banding,
			'no_hp_penggugat' => $target,
			'no_hp_tergugat' => $target2
		];

		$this->db->where('id_perkara', $id_perkara);
		$array = $this->db->update('list_perkara', $data);

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah input status perkara banding pada id perkara <b>" . $id_perkara . "</b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		if ($status_perkara == "Pengiriman Salinan Putusan") {

			//API Notifikasi WA  
			$token = "sAZJpFT7ntDM4+!gJ+h-";
			$message = "Assamualaikum Wr Wb. 
Berikut informasi perkara banding nomor: 
" . $no_perkara . "

1. Telah terdaftar pada PTA Manado tanggal: " . $tgl_reg_banding . "
2. Dengan status saat ini: " . $status_perkara . " ke Pengadilan Tingkat Pertama

Ini adalah sistem pemberitahuan otomatis perkara banding anda.
___________________________________
Ketik informasi untuk mengetahui perintah lainnya. 
*SIPEKA PTA Manado*";
		} else {

			$token = "sAZJpFT7ntDM4+!gJ+h-";
			$message = "Assamualaikum Wr Wb. 
Berikut informasi perkara banding nomor: 
" . $no_perkara . "

1. Telah terdaftar pada PTA Manado tanggal: " . $tgl_reg_banding . "
2. Dengan status saat ini: " . $status_perkara . "

Ini adalah sistem pemberitahuan otomatis perkara banding anda.
____________________________________    
Ketik informasi untuk mengetahui perintah lainnya. 
*SIPEKA PTA Manado*";
		}

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
				'delay' => '2'
			),
			CURLOPT_HTTPHEADER => array(
				"Authorization: $token"
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;
		json_encode($array);
	}

	public function uploadPutusan()
	{

		$pengedit = $this->session->userdata('nama');

		$config['upload_path']          = './files/putusan';
		$config['allowed_types']        = 'doc|docx|pdf|rtf';
		$config['max_size']             = 5024;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (($_FILES['file_putusan']['name'] != null)) {
			if ($this->upload->do_upload('file_putusan')) {
				$putusan_banding = $this->upload->data("file_name");
				$id_perkara = $this->input->post('id_perkara');

				$data = [
					'id_perkara' => $id_perkara,
					'putusan_banding' => $putusan_banding,

				];
				$this->db->where('id_perkara', $id_perkara);
				$this->db->update('list_perkara', $data);

				$this->session->set_flashdata('flash', 'Upload berhasil');

				$audittrail = array(
					'log_id' => '',
					'isi_log' => "User <b>" . $pengedit . "</b> telah upload putusan perkara banding pada id perkara <b>" . $id_perkara . "</b>",
					'nama_log' => $pengedit
				);

				$this->db->set('rekam_log', 'NOW()', FALSE);
				$this->db->insert('log_audittrail', $audittrail);

				redirect('admin/admin/inputNoper');
				// $this->db->set('putusan_banding', $putusan_banding);
			} else {
				$this->session->set_flashdata('msg', 'Upload file gagal, ekstensi file harus pdf dan ukuran tidak boleh lebih dari 5 mb');
				redirect('admin/admin/inputNoper');
			}
		} else {
			$this->session->set_flashdata('msg', 'Tidak ada file yang di upload');
			// redirect('banding/');
		}
	}

	public function upload_pp()
	{
		$pengedit = $this->session->userdata('nama');

		$id_perkara = $this->input->post('id_perkara');
		$id_user_pp = $this->input->post('id_user_pp');


		$data = [
			'id_perkara' => $id_perkara,
			'id_user_pp' => $id_user_pp,

		];
		$this->db->where('id_perkara', $id_perkara);
		$this->db->update('penunjukan_pp', $data);

		$this->session->set_flashdata('flash', 'Penunjukan Panitera Pengganti Berhasil');

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah memilih panitera pengganti pada id perkara <b>" . $id_perkara . "</b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		redirect('admin/Admin/inputNoper');
	}

	public function pilih_mh()
	{
		$pengedit = $this->session->userdata('nama');

		// $id_pmh = $this->input->post('id_pmh');
		$id_perkara = $this->input->post('id_perkara');

		$majelis_hakim = $this->input->post('majelis_hakim');


		$data = [
			// 'id_pmh' => $id_pmh,
			'id_perkara' => $id_perkara,
			'majelis_hakim' => $majelis_hakim,
		];
		$this->db->where('id_perkara', $id_perkara);
		$this->db->update('pmh', $data);

		$audittrail = array(
			'log_id' => '',
			'isi_log' => "User <b>" . $pengedit . "</b> telah memilih majelis hakim pada id perkara <b>" . $id_perkara . "</b>",
			'nama_log' => $pengedit
		);

		$this->db->set('rekam_log', 'NOW()', FALSE);
		$this->db->insert('log_audittrail', $audittrail);

		$this->session->set_flashdata('flash', 'Penunjukkan Majelis Hakim Berhasil');
		redirect('admin/Admin/inputNoper');
	}


	public function audittrail()
	{
		$data['judul'] = 'Audit Trail';
		$data['css'] = 'dashboard_admin.css';
		$data['js'] = 'log_audit.js';

		$this->load->view('admin/header', $data);
		$this->load->view('log/register_log', $data);
		$this->load->view('admin/footer', $data);
	}

	public function get_data_audittrail()
	{
		$data = $this->db->get('log_audittrail')->result();

		$result =  [
			'response' => 'success',
			'code' => 600,
			'data' => $data

		];
		echo json_encode($result);
	}


	#########
	#to Riz and all Dev
	#di bawah ini untuk menjalankan fungsi pemberitahuan inbox
	# sebelumnya, silahkan copykan script di //vendor/sql.txt/ pada sql
	#########
	//ambil data di table log_inbox
	public function get_log_inbox()
	{

		$this->db->count_all_results('log_inbox');
		$data = $this->db->get_where('log_inbox', ['is_read' => 1])->result();
		$total = $this->db->count_all_results();
		$result =  [
			'response' => 'success',
			'code' => 600,
			'data' => $data,
			'total' => $total

		];
		echo json_encode($result);
	}
	//--end

	//function saat klik log inbox
	public function click_log_inbox()
	{
		$id = $this->input->post('id');
		$update = [
			'is_read' => 2
		];
		$this->db->where('id_log_inbox', $id);
		$data = $this->db->update('log_inbox', $update);
		echo json_encode($data);
	}
	//--end
}
