<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class sendmailmodel extends CI_Model
{
    public function sendemails($id,$body,$subject)
    {
        
        // $this->load->library('email');
        // Seetings to send email
        $config=array(
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_timeout'=>30,
            'smtp_port'=>465,
            'smtp_user'=>'presidencyprojecttest@gmail.com',
            'smtp_pass'=>'nkjuhthuujvbywuy',
            'charset'=>'utf-8',
            'mailtype'=>'html',
            'newline'=>'\r\n'
        );
        $this->email->initialize($config);
        // Seetings to send email ends here

        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from("Admin@Presidency.com");
        $this->email->to("$id");
        $this->email->subject("$subject");
        $this->email->message("$body");
        if($this->email->send())
        {
            return 1;
        }
        else
        {
            echo "Error cannot send";
            print_r($this->email->print_debugger());
        }
    }
}