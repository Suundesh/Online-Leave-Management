<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class alternatefacultydata extends CI_Model{
    public function addalternatefaculty($alternatefaculty_data)
    {
        $this->db->INSERT('alternatefaculty',$alternatefaculty_data);
        return 1;
    }

    public function checkifexists($alternatefacultyid,$alternatehour,$alternatedate)
    {
        $dataarray=array(
            'alternatefacultyid'=>$alternatefacultyid,
            'hour'=>$alternatehour,
            'date'=>$alternatedate,
            'alternate_status !='=>'rejected',
        );
        $this->db->where($dataarray);
        $query = $this->db->get('alternatefaculty');
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }

    public function getfacultybyid($alternatefacultyid)
    {
        $this->db->select('*');
        $this->db->from('facultydetails');
        $this->db->where('faculty_id',$alternatefacultyid);
        $q=$this->db->get();
        return $q->result();
    }

    public function getsectiondetails($presentuserid,$day,$alternatehour)
    {
        $sec="s".substr($alternatehour,1,1)."section";
        $dt=array(
            'facultyid'=>$presentuserid,
            'day'=>$day,
        );
        $this->db->select($sec);
        $this->db->from('facultytimetable');
        $this->db->where($dt);
        $q=$this->db->get();
        return $q->result();
    }
}