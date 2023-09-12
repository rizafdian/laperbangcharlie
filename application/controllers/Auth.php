<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    //==============
    public function index()
    {

        //validasi user yang sudah login tidak dapat mengakses halaman login
        switch ($this->session->userdata('role_id')) {
            case 'null':
                redirect('Auth');
                break;
            case '1':
                redirect('admin/admin');
                break;
            case '2':
                redirect('pa/pa');
                break;
            case '3':
                redirect('hakim/hakim');
                break;
            case '4':
                redirect('pp/panitera_pengganti');
                break;
            case '5':
                redirect('pp/panitera_pengganti');
                break;
        }

        $this->form_validation->set_rules('username', 'User Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            # di sini tampilan
            $this->load->view('auth/login');
        } else {
            #di sini lolos form validation
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('users', array('username' => $username))->row_array();
            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'id' => $user['id'],
                            'nama' => $user['nama'],
                            'username' => $user['username'],
                            'role_id' => $user['role_id'],
                            'kode_pa' => $user['kode_pa']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('admin/dashboard');
                        } elseif ($user['role_id'] == 2) {
                            redirect('pa/pa');
                        } elseif ($user['role_id'] == 3) {
                            
                            redirect('hakim/hakim');
                        } else {
                            redirect('pp/dashboard_pp');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password tidak sama</div>');
                redirect('auth');
            }
        }
    } ## end Index()

    //====================
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('kode_pa');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Logout sukses..</div>');
        redirect('auth/');
    } //end logout()

    //==================
    public function forgotPassword($email)
    {


        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'id' => '',
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            //insert di tb user_token
            $this->db->insert('user_token', $user_token);
            //kirim email ke user
            $resultmail = $this->_sendEmail($email, $token);

            if (!$resultmail) {
                # code...
                $json = [
                    'status' => 'Error',
                    'message' => 'Kesalahan mengirim email.'
                ];
                echo json_encode($json);
            }

            $json = [
                'status' => 'Success',
                'message' => 'Link untuk reset password sudah dikirimkan di email anda; Silahkan Cek email anda, periksa folder SPAM jika tidak ada di INBOX'
            ];
            echo json_encode($json);
        } else {

            $json = [
                'status' => 'Error',
                'message' => 'Email anda tidak terdaftar atau tidak aktif'
            ];
            echo json_encode($json);
        }
    } //end forgotpassword()

    //===============
    private  function _sendEmail($email, $token)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://laperbang.pta-manado.go.id',
            'smtp_user' => 'info@laperbang.pta-manado.go.id',
            'smtp_pass' => 'Laperbang1234',
            'smtp_port' => 465,
            // 'smtp_crypto' => 'tls',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from($config['smtp_user'], 'laperbang pta.manado');
        $this->email->to($email);
        $this->email->subject('Reset Password');
        $this->email->message('Silahkan Klik Link ini untuk : <a href="' . base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a> Aplikasi Laperbang PTA Manado');


        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    } //end send email()

    //===============
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Reset password Gagal! Token Salah/Expired.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Reset password Gagal! email salah.</div>');
            redirect('auth');
        }
    } //end resetPassword()

    //=====================
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {;
            $this->load->view('auth/change-password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil direset! Silahkan login.</div>');
            redirect('auth');
        }
    } //end changepassword()


}
