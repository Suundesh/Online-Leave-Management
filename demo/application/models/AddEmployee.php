<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddEmployee extends CI_Model{
    public function insertEmployee($emp_data)
    {
        
        $this->db->INSERT('facultydetails',$emp_data);
    }

    public function checkifexists($emp_email)
    {
        $this->db->where('faculty_email',$emp_email);
        $query = $this->db->get('facultydetails');
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }

    // To Retrive Data
    public function getemp()
    {
        $query= $this->db->get('facultydetails');
        return $query->result();
    }

    //To delete data from table
    public function delemp($faculty_id)
    {
        $this->db->delete('facultydetails',['faculty_id'=>$faculty_id]);
    }

    public function deltt($faculty_id)
    {
        $this->db->delete('facultytimetable',['facultyid'=>$faculty_id]);   
    }

    public function erasett()
    {
        $this->db->truncate('facultytimetable');
    }

    public function getadmindetails($adminid)
    {
        $this->db->select('*');
        $this->db->from('admindetails');
        $this->db->where('admin_id',$adminid);
        $q= $this->db->get();
        // print_r($q);
        return $q->result();
    }

    public function updateadmindata($admin_data,$presentadminid)
    {
        $this->db->where('admin_id',$presentadminid);
        $this->db->update('admindetails',$admin_data);
        
    }

    public function updateadminpassword($updateadminpassword,$presentadminid)
    {
        $this->db->where('admin_id',$presentadminid);
        $this->db->update('admindetails',$updateadminpassword);
    }

    public function updatefacultydata($faculty_data,$presentempid)
    {
        $this->db->where('faculty_id',$presentempid);
        $this->db->update('facultydetails',$faculty_data);
        
    }

    public function updatefacultypassword($updatefacultypassword,$presentempid)
    {
        $this->db->where('faculty_id',$presentempid);
        $this->db->update('facultydetails',$updatefacultypassword);
    }

    public function getempdetails($empid)
    {
        $this->db->select('*');
        $this->db->from('facultydetails');
        $this->db->where('faculty_id',$empid);
        $q= $this->db->get();
        // print_r($q);
        return $q->result();
    }

    public function approveleave($presentdataid,$updatestatus)
    {
        $this->db->where('presentdataid',$presentdataid);
        $this->db->update('presentleavedata',$updatestatus);
    }

            //updates faculty_leavetaken
    public function updateleavetaken($presentdataid)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('presentdataid',$presentdataid);
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q=$this->db->get();
        $result = $q->result();
        foreach($result as $row)
        {
            $updatedata=array(
                'faculty_leavetaken'=>$row->faculty_leavetaken+$row->numofdays,
            );
            $this->db->where('faculty_id',$row->facul_id);
            $this->db->update('facultydetails',$updatedata);
        }
    }

    public function updateleaveleft($presentdataid)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('presentdataid',$presentdataid);
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q=$this->db->get();
        $result = $q->result();
        foreach($result as $row)
        {
            $updatefacultyleaveleft=array(
                'faculty_leaveleft'=>$row->faculty_leaveleft-$row->faculty_leavetaken
            );
            $this->db->where('faculty_id',$row->facul_id);
            $this->db->update('facultydetails',$updatefacultyleaveleft);
        }
    }
}