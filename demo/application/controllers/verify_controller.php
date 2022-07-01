<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verify_controller extends CI_Controller {

    public function index($hash)
    {
        $data=array(
            'hash'=>$hash
        );
        // $data['hash'] = $hash;
        $this->load->view('verify',$data);
    }

    public function approve($hash)
    {
        $this->load->model('leavedata');
        $res=$this->leavedata->approvealtfac($hash);
        if($res!=1)
        {
            echo '<script>alert("Approved"); window.location.href="'.base_url().'";</script>';
        }
        else
        {
            echo '<script>alert("Invalid Link! Enter the valid link"); window.location.href="'.base_url().'";</script>';
        }
    }

    public function reject($hash)
    {
        $this->load->model('leavedata');
        $res=$this->leavedata->rejectealtfac($hash);
        if($res!=1)
        {
            echo '<script>alert("Rejected"); window.location.href="'.base_url().'";</script>';
        }
        else
        {
            echo '<script>alert("Invalid Link! Enter the valid link"); window.location.href="'.base_url().'";</script>';
        }
    }
}