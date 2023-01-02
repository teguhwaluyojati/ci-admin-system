<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{

    public function index_get()
    {

        // $this->db->get_where('user')->result_array();

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user['is_active'] == 1) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
            }
        } else {
            $data = [
                'status' => 'failed'
            ];
        }


        $this->response($data, RestController::HTTP_OK);
    }
}
