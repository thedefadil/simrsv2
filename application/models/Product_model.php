<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "m_dokter";

    public $KDDOKTER;
    public $NAMADOKTER;
    public $st_aktif;
   // public $price;
   // public $image = "default.jpg";
   // public $description;

    public function rules()
    {
        return [
            ['field' => 'NAMADOKTER',
            'label' => 'NAMADOKTER',
            'rules' => 'required'],

            ['field' => 'st_aktif',
            'label' => 'st_aktif',
            'rules' => 'required'],
            
           /* ['field' => 'description',
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
        return $this->db->get_where($this->_table, ["KDDOKTER" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->KDDOKTER = uniqid();
        $this->NAMADOKTER = $post["NAMADOKTER"];
        $this->st_aktif = $post["st_aktif"];
      //  $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->KDDOKTER = $post["id"];
        $this->NAMADOKTER = $post["NAMADOKTER"];
        $this->st_aktif = $post["st_aktif"];
       // $this->price = $post["price"];
      //  $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('KDDOKTER' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("KDDOKTER" => $id));
    }
}
