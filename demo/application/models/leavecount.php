<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class leavecount extends CI_Model
{
    public function getleavecount($sessionempid)
    {
        $this->db->select('*');
        $this->db->from('facultydetails');
        $this->db->where('faculty_id',$sessionempid);
        $this->db->join('presentleavedata', 'facultydetails.faculty_id=facul_id');
        $q= $this->db->get();
        return $q->result();
    }

    public function leavecount1($sessionempid)
    {
        $this->db->select('*');
        $this->db->from('facultydetails');
        $this->db->where('faculty_id',$sessionempid);
        $q= $this->db->get();
        return $q->result();
    }

    public function retrivedates($dates)
    {
        $this->db->select('*');
        $this->db->from('presentleavedata');
        $this->db->where('presentdataid',$dates);
        $q= $this->db->get();
        return $q->result();
    }
}