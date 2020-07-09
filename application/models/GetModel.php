<?php
class GetModel extends CI_Model{

    // Fetch info
    public function getInfo($table)
    {
        return $this->db->get($table)->result();
    }

    // Fetch info by id
    public function getInfoById($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->get($table)->row();
    }

    // Fetch info by id
    public function getInfoByIdType($col ,$id, $table)
    {
        $this->db->where($col, $id);
        return $this->db->get($table)->row();
    }

    // Fetch album
    public function getAlbum()
    {
        $this->db->select('album');
        $this->db->distinct();
        return $this->db->get('gallery')->result();
    }

    // Fetch album
    public function getAlbums()
    {
        $this->db->distinct('album');
        return $this->db->get('gallery')->result();
    }
    
    // Fetch info with type
    public function getInfoType($table,$col,$key)
    {
        $this->db->where($col, $key);
        return $this->db->get($table)->result();
    }

    // Fetch visible info with type
    public function getPatients()
    {
        $this->db->select('*')
                ->from('patients p')
                ->join('services s', 'p.services_id = s.id', 'LEFT');
        return $this->db->get()->result();
    }

    // Fetch visible info with type
    public function getPatientsById($id)
    {
        $this->db->select('*')
                ->from('patients p')
                ->join('services s', 's.id = p.services_id', 'LEFT')
                ->where('p.pid',$id);
        return $this->db->get()->row();
    }

    public function getCareers()
    {
        $this->db->select('*')
                ->from('careers')
                ->join('cities', 'cities.id = careers.city_id', 'LEFT')
                ->join('states', 'cities.state_id = states.id', 'LEFT');
        return $this->db->get()->result();
    }

    public function getVisibleCareers()
    {
        $this->db->select('*')
                ->from('careers')
                ->join('cities', 'cities.id = careers.city_id', 'LEFT')
                ->join('states', 'cities.state_id = states.id', 'LEFT')
                ->where('careers.visibility','1');
        return $this->db->get()->result();
    }



    // Fetch info by order
    public function getInfoByOrder($table)
    {
        return $this->db->order_by('id', 'desc')
                        ->get($table)
                        ->result();
    }

    // Fetch limited info by order
    public function getLimInfo($table,$lim,$order)
    {
        return $this->db->limit($lim)
                        ->order_by('id', $order)
                        ->get($table)
                        ->result();
    }

    // Fetch visible Info
    public function getVisibleInfo($table)
    {
        $this->db->where('visibility', '1');
        return $this->db->get($table)->result();
    }

    // Fetch max info
    public function getMaxNo($table, $column)
    {
        $this->db->select_max($column);
        $result = $this->db->get($table)->row();  
        return $result->$column;
    }

    // Fetch Enquiries
    public function getEnquiries()
    {
        return $this->db->get('enquiries')->result();
    }

    // Count no. of rows in table 
    public function record_count($table,$column,$key) 
    {
        return $this->db->where($column,$key)->get($table)->num_rows();
    }
    
    // Fetch Admin Profile
    public function getAdminProfile()
    {
        return $this->db->get('users')->row();
    }

    // Fetch Website Profile
    public function getWebProfile()
    {
        return $this->db->get('webprofile')->row();
    }

    

}
?>