<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_controller extends CI_Controller {

	public function login()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo 'Something went wrong!';
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$check = $this->Auth_Model->check_user($email);
			if($check == 1)
			{
				$check_pass = $this->Auth_Model->check_pass($email,$password);
				if($check_pass == 1)
				{
					$get_user = $this->Auth_Model->get_user($email,$password);
					if ($get_user) {
						$user_data=array(
							'emp_id'=>$get_user->faculty_id,
							'emp_email'=>$get_user->faculty_email,
						);
						$this->session->set_userdata($user_data);
						echo 'ok';
					} else {
						echo 'invalid_password';
					}
				}
			}
			else
			{
				echo 'not_exist';
			}
		}
	}

	public function admin_login()
	{
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			echo 'Something went wrong!';
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$check = $this->Auth_Model->check_admin_user($email);
			if($check == 1)
			{
				$check_pass = $this->Auth_Model->check_admin_pass($email,$password);
				if($check_pass == 1)
				{
					$get_user = $this->Auth_Model->get_admin_user($email,$password);
					if ($get_user) {
						$user_data=array(
							'id'=>$get_user->admin_id,
							'email'=>$get_user->email,
						);
						$this->session->set_userdata($user_data);
						echo 'success';
					} else {
						echo 'invalid_password';
					}
				}
			}
			else
			{
				echo 'not_exist';
			}
		}
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
		redirect(base_url());
	}
}