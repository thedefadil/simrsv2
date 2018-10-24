<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_poly extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_poly_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'm_poly/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'm_poly/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'm_poly/index.html';
            $config['first_url'] = base_url() . 'm_poly/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_poly_model->total_rows($q);
        $m_poly = $this->M_poly_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_poly_data' => $m_poly,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('m_poly/m_poly_list', $data);
    }

    public function read($id) 
    {
        $row = $this->M_poly_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode' => $row->kode,
		'nama' => $row->nama,
		'jenispoly' => $row->jenispoly,
		'ref_bpjs' => $row->ref_bpjs,
		'aktif' => $row->aktif,
	    );
            $this->load->view('m_poly/m_poly_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_poly'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_poly/create_action'),
	    'kode' => set_value('kode'),
	    'nama' => set_value('nama'),
	    'jenispoly' => set_value('jenispoly'),
	    'ref_bpjs' => set_value('ref_bpjs'),
	    'aktif' => set_value('aktif'),
	);
        $this->load->view('m_poly/m_poly_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jenispoly' => $this->input->post('jenispoly',TRUE),
		'ref_bpjs' => $this->input->post('ref_bpjs',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_poly_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_poly'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_poly_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_poly/update_action'),
		'kode' => set_value('kode', $row->kode),
		'nama' => set_value('nama', $row->nama),
		'jenispoly' => set_value('jenispoly', $row->jenispoly),
		'ref_bpjs' => set_value('ref_bpjs', $row->ref_bpjs),
		'aktif' => set_value('aktif', $row->aktif),
	    );
            $this->load->view('m_poly/m_poly_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_poly'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'jenispoly' => $this->input->post('jenispoly',TRUE),
		'ref_bpjs' => $this->input->post('ref_bpjs',TRUE),
		'aktif' => $this->input->post('aktif',TRUE),
	    );

            $this->M_poly_model->update($this->input->post('kode', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_poly'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_poly_model->get_by_id($id);

        if ($row) {
            $this->M_poly_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_poly'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_poly'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenispoly', 'jenispoly', 'trim|required');
	$this->form_validation->set_rules('ref_bpjs', 'ref bpjs', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('kode', 'kode', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_poly.php */
/* Location: ./application/controllers/M_poly.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-23 07:22:43 */
/* http://harviacode.com */