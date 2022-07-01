<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddTimetable extends CI_Model{
    public function insertTimetable($emp_timetable)
    {
        
        $this->db->INSERT('facultytimetable',$emp_timetable);
    }

    //To Retrive Data
    public function getemptimetable($sessionempid)
    {
        $this->db->select('*');
        $this->db->from('facultytimetable');
        $this->db->where('facultyid',$sessionempid);
        $q= $this->db->get();
        return $q->result();
    }

    public function getemptimetablebyday($sessionempid,$day)
    {
        $this->db->where('facultyid',$sessionempid);
        $query1 = $this->db->get('facultytimetable');
        if(!empty($query1->result_array()))
        {
            $data = array(
                'facultyid'=>$sessionempid,
                'day'=>$day,
            );
            $this->db->where($data);
            $query = $this->db->get('facultytimetable');
            if(!empty($query->result_array()))
            {
                return 1;
            }
        }
        
    }
}