<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profiles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //user jika user tidak punya sesssion
        if (!$this->session->userdata('id') || $this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
    }



    public function get_profile()
    {
        $id = $this->session->userdata('id');
        $data = $this->db->get_where('users', ['id' => $id])->result();
        echo json_encode($data);
    }

    //update data profile diluar password
    public function update_data()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'operator' => $this->input->post('operator'),
        ];

        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        echo json_encode($result);
    }

    //check  password error
    public function check_password_error()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldPassword', 'Password lama', 'required|trim', [
            'required' => 'Silahkan masukkan password lama!!'
        ]);
        $this->form_validation->set_rules('newPassword', 'Password baru', 'required|trim|min_length[4]', [
            'required' => 'Silahkan masukkan password baru!!',
            'min_length' => 'Password minimum 4 Karakter!!'
        ]);
        $this->form_validation->set_rules('repeatPassword', 'Password baru', 'required|trim|matches[newPassword]', [
            'required' => 'Silahkan ketikkan lagi password baru',
            'matches' => 'Password tidak sama!!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $json = [
                'status' => FALSE,
                'oldPassword' => form_error('oldPassword'),
                'newPassword' => form_error('newPassword'),
                'repeatPassword' => form_error('repeatPassword')
            ];
            echo json_encode($json);
        } else {

            $json = [
                'status' => TRUE,
                'message' => 'success'
            ];
            echo json_encode($json);
        }
    }
    //--- end


    //update password
    public function update_password()
    {
        $id = $this->input->post('id');
        $oldPassword = $this->input->post('oldpass');
        $newPassword = $this->input->post('newpass');

        //ambil data di database
        $db = $this->db->get_where('users', ['id' => $id])->result_array();
        $passondb = $db['0']['password'];

        if (password_verify($oldPassword, $passondb) == true) {
            # update password
            $data = [
                'password' => password_hash($newPassword, PASSWORD_DEFAULT)
            ];
            $this->db->where('id', $id);
            $result = $this->db->update('users', $data);
            $json = [
                'status' => $result,
                'message' => 'Password Berhasil dirubah'
            ];
            echo json_encode($json);
        } else {
            $json = [
                'status' => false,
                'message' => 'password salah'
            ];
            echo json_encode($json);
        }
    }
    //--- end




}
