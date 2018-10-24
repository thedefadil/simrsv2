<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    private $_table = "m_unit";

    public $kode_unit;
    public $nama_unit;
    public $grup_unit;
    public $nama_grupunit;
    public $pendapatan_unit;
   // public $price;
   // public $image = "default.jpg";
   // public $description;

    public function rules()
    {
        return [
            ['field' => 'kode_unit',
            'label' => 'kode_unit',
            'rules' => 'required'],
/*
            ['field' => 'st_aktif',
            'label' => 'st_aktif',
            'rules' => 'required'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']*/
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kode_unit" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->KDDOKTER = uniqid();
        $this->kode_unit = $post["kode_unit"];
        $this->nama_unit = $post["nama_unit"];
        $this->grup_unit = $post["grup_unit"];
        $this->nama_grupunit = $post["nama_grupunit"];
        $this->pendapatan_unit = $post["pendapatan_unit"];
      //  $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $this->kode_unit = $post["kode_unit"];
        $this->nama_unit = $post["nama_unit"];
        $this->grup_unit = $post["grup_unit"];
        $this->nama_grupunit = $post["nama_grupunit"];
        $this->pendapatan_unit = $post["pendapatan_unit"];
       // $this->price = $post["price"];
      //  $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('kode_unit' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kode_unit" => $id));
    }
}
