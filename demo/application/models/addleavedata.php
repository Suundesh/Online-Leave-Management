<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addleavedata extends CI_Model
{
    public function insertdata($emp_leavedata)
    {
        $this->db->INSERT('presentleavedata',$emp_leavedata);
    }

    public function getfacultydetails($empid)
    {
        
    }
}