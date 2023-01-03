<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New submenu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        if ($this->db->affected_rows()>0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Delete!</div>');
            redirect('menu');
        }
    }

    public function edMenu($id)
    {
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('newMenu', 'NewMenu', 'required|trim|is_unique[user_menu.menu]',[
            'is_unique' => 'Menu already registered!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('templates/footer');
        }else{
            $newMenu = $this->input->post('newMenu');

            $this->db->set('menu', $newMenu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Menu Success!</div>');

            redirect('menu');
        }
    }

    public function edSubMenu($id)
    {
        $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['title'] = 'Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('newTitle','newTitle','trim|is_unique[user_sub_menu.title]',[
            'is_unique'=> 'Title already registered!'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-submenu', $data);
            $this->load->view('templates/footer');
        }else{
            $newTitle = $this->input->post('newTitle');
            $newIcon = $this->input->post('newIcon');
            $newStatus = $this->input->post('newStatus');

            $this->db->set('title', $newTitle);
            $this->db->set('icon', $newIcon);
            $this->db->set('is_active', $newStatus);
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Sub Menu Success!</div>');

            redirect('menu/submenu');
        }
    }

    public function delSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');

        if($this->db->affected_rows()> 0 ){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Delete!</div>');
            redirect('menu/submenu');
        }
    }
}
