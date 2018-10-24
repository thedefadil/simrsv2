<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mlogin_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
       // $this->load->model('m_poly_model');
        $data["mlogin"] = $this->mlogin_model->getAll();
       // $data["m_poly"] = $this->m_poly_model->getAll();
        $this->load->view("admin/mlogin/list", $data);
       // $this->load->view("m_poly/m_poly_list", $data);

    }

    public function add()
    {
        $mlogin = $this->mlogin_model;
        $validation = $this->form_validation;
        $validation->set_rules($mlogin->rules());

        if ($validation->run()) {
            $mlogin->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/mlogin/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/mlogin');
        $this->load->model('unit_model');
        $this->load->model('m_roles_model');
        $mlogin = $this->mlogin_model;
      //  $unit = $this->unit_model;
        $validation = $this->form_validation;
        $validation->set_rules($mlogin->rules());

        if ($validation->run()) {
            $mlogin->update();

            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["unit"] = $this->unit_model->getAll();
        $data["m_roles"] = $this->m_roles_model->get_all();
        $data["mlogin"] = $mlogin->getById($id);
        if (!$data["mlogin"]) show_404();
       
        $this->load->view("admin/mlogin/edit_form", $data);
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mlogin_model->delete($id)) {
            redirect(site_url('admin/mlogin'));
        }
    }
}
