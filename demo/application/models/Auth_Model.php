<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    public function check_admin_user($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('admindetails');
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }
    public function check_admin_pass($email,$pass)
    {
        $data = array(
            'email'=>$email,
            'password'=>$pass,
        );
        $query = $this->db->get('admindetails');
        $this->db->where($data);
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }
    public function get_admin_user($email,$pass)
    {
        $data = array(
            'email'=>$email,
            'password'=>$pass,
        );
        $query = $this->db->get('admindetails');
        $this->db->where($data);
        return $query->row();
    }
    public function check_user($email)
    {
        $this->db->where('faculty_email', $email);
        $query = $this->db->get('facultydetails');
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }
    public function check_pass($email,$pass)
    {
        $data = array(
            'faculty_email'=>$email,
            'faculty_password'=>$pass,
        );
        $query = $this->db->get('facultydetails');
        $this->db->where($data);
        if(!empty($query->result_array()))
        {
            return 1;
        }
    }
    public function get_user($email,$pass)
    {
        $data = array(
            'faculty_email'=>$email,
            'faculty_password'=>$pass,
        );
        $query = $this->db->get('facultydetails');
        $this->db->where($data);
        return $query->row();
    }
}