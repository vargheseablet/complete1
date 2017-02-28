<?php
class bank_model extends CI_Model
{	
	public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    public function verify_user($data)
    {
    	$where1 = array('mob_no' => $data['mob_no']);
    	$table = 'users';
    	$this->db->select('password');
    	$query = $this->db->get_where($table, $where1);

        foreach ( $query->result() as $pass1) {
        
            if ($pass1->password == $data['password']) {
                return 1;
            }
        }   
    }

    public function insert_into_db($data)
    {
        $this->db->insert('users', $data);
        return 1;
    }

    public function getbank_data($data)
    {
        $where1 = array('mob_no' => $data['mob_no']);
        $table = 'states_bank';
        $this->db->select('balance');
        $query = $this->db->get_where($table, $where1);        
        return $query->result_array();;
    }

    public function getuser_data($data)
    {
        $where1 = array('mob_no' => $data['mob_no']);
        $table = 'users';
        $this->db->select('user_id');
        $query = $this->db->get_where($table, $where1);
        return $query->result_array();
    }

    public function bank_db($data)
    {
        $data1 = array(
        'balance' => $data['balance']
        );
        $this->db->where('mob_no', $data['mob_no']);
        $this->db->update('states_bank', $data1);
        return 1;
    }
    
    public function txn_db($data)
    {
        $this->db->insert('user_txn', $data);
        return 1;
    }

    public function get_trans_db($data)
    {
        $this->db->from('user_txn');
        $this->db->where('from_mob', $data);
        $this->db->or_where('to_mob ', $data);
        $this->db->order_by('txn_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_data($data)
    {
        $this->db->from('users');
        $this->db->where('mob_no', $data);
        $query = $this->db->get();
        return $query->result_array();
    }
}    