<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Mlogin_model extends CI_Model
{
	private $_table = "m_login";
	public $NIP;
	public $PWD;
	public $ROLES;
	public $KDUNIT;
	public $DEPARTEMEN;

	public function rules()
    {
        return [
            ['field' => 'NIP',
            'label' => 'NIP',
            'rules' => 'required'],

          /*   ['field' => 'PWD',
            'label' => 'PWD',
            'rules' => 'required'],
            
           ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']*/
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $this->db->select('*');
		$this->db->from('m_login a');
		$this->db->join('m_roles b', 'a.ROLES = b.kode');
		$this->db->join('m_unit c', 'a.KDUNIT = c.kode_unit');
		//$this->db->where('a.NIP',$id);
		$query = $this->db->get();
        if($query->num_rows() > 0)
             {
        $results = $query->result();
            }
    return $results;

    }
    
    public function getById($id)
    {
        //return $this->db->get_where($this->_table, ["NIP" => $id])->row();
        $this->db->select('*');
		$this->db->from('m_login a');
		$this->db->join('m_roles b', 'a.ROLES = b.kode');
		$this->db->join('m_unit c', 'a.KDUNIT = c.kode_unit');
		$this->db->where('a.NIP',$id);
		$query = $this->db->get();
        if($query->num_rows() > 0)
             {
        $results = $query->result();
            }
    return $results;
    }

    public function save()
    {
        $post = $this->input->post();
       // $this->KDDOKTER = uniqid();
        $this->NIP = $post["NIP"];
        $this->PWD = $post["PWD"];
        $this->ROLES = $post["ROLES"];
        $this->KDUNIT = $post["KDUNIT"];
        $this->DEPARTEMEN = $post["DEPARTEMEN"];
      //  $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->NIP = $post["nip"];
        $this->PWD = $post["pass"];
        $this->ROLES = $post["roles"];
        $this->KDUNIT = $post["unit"];
        $this->DEPARTEMEN = $post["unit"];
       // $this->price = $post["price"];
      //  $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('NIP' => $post['nip']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("NIP" => $id));
    }
}