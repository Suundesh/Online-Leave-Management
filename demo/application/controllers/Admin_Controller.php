<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('leavedata');  						// this is to fetch the data
		$emp_leavedata['empleavedetails']=$this->leavedata->getleavedata();	// this is to fetch the data
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/index',$emp_leavedata);	//sendingdata to index page
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	public function approved_leave()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');
		$this->load->model('leavedata');
		$emp_approveddata['empleavedetails']=$this->leavedata->getapprovedleavedata();
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/approved_leave',$emp_approveddata);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	public function Profile_Page()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('AddEmployee');
		$admin_details['admindetails']=$this->AddEmployee->getadmindetails($this->session->userdata('id'));
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/Profile_Page',$admin_details);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	public function Details_Page($presentdataid)
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('leavedata');
		$emp_leavedata['empleavedetails']=$this->leavedata->viewleavestatus($presentdataid);
		$emp_leavedata['alternatefaculty']=$this->leavedata->getalternatefacultydata($presentdataid);
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/Details_Page',$emp_leavedata);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	//used to display leave details in approved and rejected page
	public function leavedetails_page($presentdataid)
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('leavedata');
		$emp_leavedata['empleavedetails']=$this->leavedata->viewleavestatus($presentdataid);
		$emp_leavedata['alternatefaculty']=$this->leavedata->getalternatefacultydata($presentdataid);
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/leavedetails_page',$emp_leavedata);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	public function AddUser_Page()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('AddEmployee');  		// this is to fetch the data
		$emp_data['employeedetails']=$this->AddEmployee->getemp();		// this is to fetch the data		
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/AddUser_Page',$emp_data);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/scripts/adduser');
		$this->load->view('admin/Partials/footer_close');
	}

	public function rejected_page()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->view('admin/Partials/header');	
		$this->load->model('leavedata');
		$emp_rejectedddata['empleavedetails']=$this->leavedata->getrejectedleavedata();
		$this->load->view('admin/Partials/aside');
		$this->load->view('admin/rejected_page',$emp_rejectedddata);
		$this->load->view('admin/Partials/footer');	
		$this->load->view('admin/Partials/footer_close');
	}

	// to add employee
	public function store()
	{
			if(!$this->session->userdata('email'))
			redirect(base_url());
			$emp_name= $this->input->post('emp_name');
			$emp_email= $this->input->post('emp_email');
			$emp_password= $this->input->post('emp_password');
			$emp_data=array
			(
			'faculty_name'=>$emp_name,
			'faculty_email'=>$emp_email,
			'faculty_password'=>$emp_password
			);	
			if(!$emp_data)
			{
				$this->AddUser_Page();
				//todisplayvalues var_dump($emp_data);
			}
			else
			{
				$this->load->model('AddEmployee');
				$checkuser=$this->AddEmployee->checkifexists($emp_email);
				if($checkuser==1)					
				{
					echo '<script>alert("User Already Exists");</script>';
					$this->AddUser_Page();
				}
				else
				{
					$this->load->model('AddEmployee');
					$this->AddEmployee->insertEmployee($emp_data);
					echo '<script>alert("User Added");</script>';
					$this->AddUser_Page();
				}
				
			}
	}

	public function resettimetable()
	{
		$this->load->model("AddEmployee");
		$this->AddEmployee->erasett();
		echo '<script>alert("Time Table Data Erased"); window.location.href="'.base_url().'admin/AddUser_Page";</script>';
	}
	// To delete employee data from table
	public function deleteemp($faculty_id)
	{
		$this->load->model("AddEmployee");
		$this->AddEmployee->delemp($faculty_id);
		// $this->AddUser_Page();		
		echo '<script>alert("Employee Deleted"); window.location.href="'.base_url().'admin/AddUser_Page";</script>';
		// redirect(base_url('AddUser_Page'));
	}

	public function deletetimetable($faculty_id)
	{
		$this->load->model("AddEmployee");
		$this->AddEmployee->deltt($faculty_id);
		echo '<script>alert("Time Table Reset Sucessfull"); window.location.href="'.base_url().'admin/AddUser_Page";</script>';
		// $this->AddUser_Page();
	}

	public function updateprofile()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$presentadminid=$this->session->userdata('id');
		$updateemail=$this->input->post('updateemail');
		$updatenumber=$this->input->post('updatenumber');

		if (($updateemail != '') && ($updatenumber != ''))
		{
			$admin_data=array(
				'email'=>$updateemail,
				'phone'=>$updatenumber
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updateadmindata($admin_data,$presentadminid);
			echo '<script>alert("Updated Sucessfully");</script>';
			$this->Profile_Page();
		}
		else if ($updateemail == '' && $updatenumber != '')
		{
			$admin_data=array(
				'phone'=>$updatenumber
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updateadmindata($admin_data,$presentadminid);
			echo '<script>alert("Updated Sucessfully");</script>';
			$this->Profile_Page();
		}
		else if ($updateemail != '' && $updatenumber == '')
		{
			$admin_data=array(
				'email'=>$updateemail,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updateadmindata($admin_data,$presentadminid);
			echo '<script>alert("Updated Sucessfully");</script>';
			$this->Profile_Page();
		}
		else if(($updateemail == '') && ($updatenumber == ''))
		{
			$this->Profile_Page();
		}

	}

	public function updatepassword()
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$presentadminid=$this->session->userdata('id');
		$newpassword=$this->input->post('newpassword');
		$confirmnewpassword=$this->input->post('confirmnewpassword');
		if(($newpassword==$confirmnewpassword) && ($newpassword!='' && $confirmnewpassword!=''))
		{
			$updateadminpassword=array(
				'password'=>$newpassword
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updateadminpassword($updateadminpassword,$presentadminid);
			echo '<script>alert("Updated Sucessfully");</script>';
			$this->Profile_Page();
		}
		else
		{
			echo '<script>alert("Update Failed");</script>';
			$this->Profile_Page();
		}
	}

	public function approveleave($presentdataid)
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$this->load->model('AddEmployee');
		$adminremark=$this->input->post('adminremarks');
		$updatestatus=array(
		'status'=>'Approved',
		'adminremark'=>$adminremark,
		);
		$this->AddEmployee->approveleave($presentdataid,$updatestatus);
		$this->AddEmployee->updateleavetaken($presentdataid); 
		$this->AddEmployee->updateleaveleft($presentdataid); 
		echo '<script>alert("Approved"); window.location.href="'.base_url().'admin/dashboard";</script>';
	}

	public function rejectleave($presentdataid)
	{
		if(!$this->session->userdata('email'))
		redirect(base_url());
		$adminremark=$this->input->post('adminremarks');
		$this->load->model('AddEmployee');
		$updatestatus=array(
			'status'=>'Rejected',
			'adminremark'=>$adminremark,
		);
		$this->AddEmployee->approveleave($presentdataid,$updatestatus);
		echo '<script>alert("Rejected"); window.location.href="'.base_url().'admin/dashboard";</script>';
		$this->index();
	}

}