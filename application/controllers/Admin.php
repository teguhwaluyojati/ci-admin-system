<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dashboard'] = $this->db->get('user')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addRole()
    {
        

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if($this->form_validation->run()== false){
            return false;
        }else{
            $role = $this->input->post('role');
            $this->db->insert('user_role', ['role'=> $role]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Has Been Added!</div>');

            redirect('admin/role');
        }
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function user()
    {
        $data['title'] = 'Add New User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Passwoord too short!',
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/add-user', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $active = $this->input->post('is_active');
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => $active,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add New User Success!</div>');
            redirect('admin');
        }
    }

    public function delete($id)
    {
        $id = $this->input->post('delId');

        $this->db->where('id', $id);
        $this->db->delete('user');

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete User Success!</div>');
            redirect('admin');
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete User Failed!</div>');
        redirect('admin');
    }
    redirect('admin');
}

    public function edit($id)
    {
        $data ['title'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['now'] = $this->db->get_where('user', ['id' => $id])->row_array();
        
        $id = $this->input->post('edId');

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email1', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email already registered!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-user', $data);
            $this->load->view('templates/footer');
    }else{
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $status = $this->input->post('status');
        $idNow = $this->input->post('idNow');
        
        $this->db->set('name', $name);
        $this->db->set('role_id', $role);
        $this->db->set('is_active', $status);
        $this->db->set('email', $email);
        $this->db->where('id', $idNow);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit User Success!</div>');

        redirect('admin');
    }
}
}
