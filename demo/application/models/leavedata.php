<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class leavedata extends CI_Model
{
    public function getleavedata()
    {
        //Joining two tables
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('status',"pending");
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function getleavestatus($sessionempid)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('facul_id',$sessionempid);
        $q= $this->db->get();
        return $q->result();
    }

    public function viewleavestatus($presentdataid)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('presentdataid',$presentdataid);
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function getapprovedleavedata()
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('status','approved');
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function getrejectedleavedata()
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('status','rejected');
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function retriveapplication($presentleaveid)
    {
        $this->db->where('presentdataid', $presentleaveid);
        $this->db->delete('presentleavedata');
    }

    public function afterretrival($presentleaveid)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('presentdataid',$presentleaveid) ;
        $this->db->join('facultydetails', 'presentleavedata.facul_id=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }
    
    public function updateleavecount($presentfacultyid,$updateleaveleft)
    {
        $this->db->where('faculty_id',$presentfacultyid);
        $this->db->update('facultydetails',$updateleaveleft);
    }

    // public function get_alternate_faculty($facultyid,$alternatedate,$alternatehour,$day)
    // {
    //     $get_timetable = array(
    //         'day'=>$day,
    //         "$alternatehour"=>'free'
    //     );
    //     $this->db->select('*');
    //     $this->db->from('facultytimetable');
    //     $this->db->where($get_timetable);
    //     $q= $this->db->get();
    //     $result = $q->result();
    //     print_r($result);
    //     // foreach($result as $row)
    //     // {
    //     // $faculty_id=$row->facultyid;
    //     // print_r($faculty_id);
    //     // $this->db->select('*');
    //     // $this->db->from('facultydetails');
    //     // $this->db->where('faculty_id',$row->facul_id);
    //     // $q= $this->db->get();
    //     // $result1 = $q->result();
    //     // print_r($result1);
    //     // return $result1;
    //     // }
        
       
    //     // print_r($facultyid);
    //     // foreach($result as $row1)
    //     // {
    //     // $getvaluefrompresentlavedata=array(
    //     //     'facul_id'=>$row1->facultyid,
    //     // );
    //     // $this->db->select('*');
    //     // $this->db->from('presentleavedata');
    //     // $this->db->where();
    //     // $q= $this->db->get();
    //     // $result = $q->result();
    //     // }
    //     // foreach($result as $row1)
    //     // {
    //     //     $getvaluefrompresentlavedata=array(
    //     //         'facul_id'=>$row1->facultyid,

    //     //     );
    //     //     $this->db->select('*');
    //     //     $this->db->from('presentleavedata');
    //     //     $this->db->where($getvaluefrompresentlavedata);
    //     //     $q=$this->db->get();
    //     //     $presentleavedata_result=$q->result();
    //     //     if(empty($presentleavedata_result))
    //     //     {

    //     //     }
    //         // print_r($presentleavedata_result);
    //     //  }
        
    //     // foreach($presentleavedata_result as $row)
    //     // {
    //     //     if((!$row->leavefrom <= $alternatedate && $alternatedate <= $row->leaveto))
    //     //     {
    //     //         $faculty_id = $row1->facultyid;
    //     //         $check_alternate_faculty = array(
    //     //             'alternatefacultyid' => $faculty_id,
    //     //             'date' => $alternatedate,
    //     //             'hour' => $alternatehour,
    //     //             'alternate_status !=' => 'rejected'
    //     //         );
    //     //         $this->db->select('*');
    //     //         $this->db->from('alternatefaculty');
    //     //         $this->db->where($check_alternate_faculty);
    //     //         $q1 = $this->db->get();
    //     //         if(!empty($q1->result_array()))
    //     //         {
    //     //             return $q1->result();
    //     //         }
    //     //         else
    //     //         {
    //     //             $this->db->select('*');
    //     //             $this->db->from('facultydetails');
    //     //             $this->db->where('faculty_id',$faculty_id);
    //     //             $q1 = $this->db->get();
    //     //             return $q1->result();
    //     //         }
    //     //     }
    //     // }
        
    // }

    //to diaplay alternate faculty data
    public function getalternatefacultydata($presentdataid)
    {
        $this->db->select('*');
        $this->db->from('alternatefaculty');
        $this->db->where('presentdata_id',$presentdataid);
        $this->db->join('facultydetails', 'alternatefaculty.alternatefacultyid=faculty_id');
        $q=$this->db->get();
        return $q->result();
    }

    public function get_alternate_faculty($presentdataid,$alternatedate,$alternatehour,$day)
    {
        $get_timetable = array(
            'day'=>$day,
            "$alternatehour"=>'free',
            'facultyid !=' => $this->session->userdata('emp_id')
        );
        $this->db->select('*');
        $this->db->from('facultytimetable');
        $this->db->where($get_timetable);
        $this->db->join('facultydetails','facultytimetable.facultyid=faculty_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function approvealtfac($hash)
    {
        $this->db->where('hash', $hash);
        $query = $this->db->get('alternatefaculty');
        if(!empty($query->result_array()))
        {
            $data=array(
            'alternate_status'=>'Approved',
            'hash'=>'NULL',
            );
            $this->db->set($data);
            $this->db->where('hash',$hash);
            $res=$this->db->update('alternatefaculty');
        }
        else
        {
            return 1;
        }
    }

    public function rejectealtfac($hash)
    {
        $this->db->where('hash', $hash);
        $query = $this->db->get('alternatefaculty');
        if(!empty($query->result_array()))
        {
            $data=array(
            'alternate_status'=>'Rejected',
            'hash'=>'NULL',
            );
            $this->db->set($data);
            $this->db->where('hash',$hash);
            $res=$this->db->update('alternatefaculty');
        }
        else
        {
            return 1;
        }
    }
}