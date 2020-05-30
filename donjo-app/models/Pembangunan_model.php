<?php class Pembangunan_model extends CI_Model {

    //private $table;

    public function __construct()
    {
        parent::__construct();
        //$this->table = 'pembangunan';
    }

    public function get($id = null)
    {
        if ($id === null)
            return $this->db->get('pembangunan')->result_array();
        else
            return $this->db->get_where('pembangunan',['id' => $id])->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('pembangunan', ['id' => $id]);
        
        return $this->db->affected_rows();
    }

    public function create($data)
    {
        $this->db->insert('pembangunan', $data);

        return $this->db->affected_rows();
    }

    public function update($data, $id)
    {
        $this->db->update('pembangunan', $data, ['id' => $id]);

        return $this->db->affected_rows();
    }

}