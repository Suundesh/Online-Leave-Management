<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Controller extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->view('Employee/Partials/header');
		$this->load->model('leavecount');
		$emp_data['empdetails']=$this->leavecount->getleavecount($this->session->userdata('emp_id'));
		$emp_data['empleavedetails']=$this->leavecount->leavecount1($this->session->userdata('emp_id'));
		$this->load->view('Employee/Partials/aside');
		$this->load->view('Employee/index',$emp_data);
		$this->load->view('Employee/Partials/footer');	
	}
		//did changes today
	public function leavestatus()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->view('Employee/Partials/header');
		$this->load->model('leavedata');  						// this is to fetch the data
		$emp_leavedata['empleavedetails']=$this->leavedata->getleavestatus($this->session->userdata('emp_id'));	// this is to fetch the data
		$this->load->view('Employee/Partials/aside');
		$this->load->view('Employee/leavestatus',$emp_leavedata);
		$this->load->view('Employee/Partials/footer');	
	}

	public function Profile_Page()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->view('Employee/Partials/header');
		$this->load->model('AddEmployee');
		$employee_details['employeedetails']=$this->AddEmployee->getempdetails($this->session->userdata('emp_id'));
		$this->load->view('Employee/Partials/aside');
		$this->load->view('Employee/Profile_Page',$employee_details);
		$this->load->view('Employee/Partials/footer');	
	}

	public function timetable_page()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->view('Employee/Partials/header');
		$this->load->model('AddTimetable');  		// this is to fetch the data
		$emp_timetable['employeetimetable']=$this->AddTimetable->getemptimetable($this->session->userdata('emp_id'));
		$this->load->view('Employee/Partials/aside');
		$this->load->view('Employee/timetable_page',$emp_timetable);
		$this->load->view('Employee/Partials/footer');	
	}
			
	public function statusdetails($presentdataid)
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->view('Employee/Partials/header');	
		$this->load->model('leavedata');
		$emp_leavedata['empleavedetails']=$this->leavedata->viewleavestatus($presentdataid);
		$emp_leavedata['alternatefaculty']=$this->leavedata->getalternatefacultydata($presentdataid);
		$this->load->view('Employee/Partials/aside');
		$this->load->view('Employee/statusdetails_page',$emp_leavedata);
		$this->load->view('Employee/Partials/footer');	
	}

	public function presentleavedata()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$facultyid=$this->session->userdata('emp_id');
		$fromdate=$this->input->post('from_date');
		$todate=$this->input->post('to_date');
		$date1 = new DateTime($fromdate);
		$date2 = new DateTime($todate);
		$interval = $date1->diff($date2);
		$numofdays=$interval->days+1;
		$leavetype=$this->input->post('leavetype');
		$leavereason=$this->input->post('leave_reason');
		$config['upload_path']= './assets/uploads/';
		$config['allowed_types']= 'pdf';
		$this->load->library('upload', $config);
		//to check if leave is available
		$this->load->model('AddEmployee');
		$empdetails=$this->AddEmployee->getempdetails($this->session->userdata('emp_id'));
		foreach($empdetails as $em)
		{
			if($numofdays>$em->faculty_leaveleft)
			{
				echo '<script>alert("You are exceeding permitted leave count"); window.location.href="'.base_url().'employee/dashboard";</script>';
			}
			else if(!$this->upload->do_upload('emp_document'))
			{
					$file_data=$this->upload->data();
					$file_name=$file_data['file_name'];
					$emp_leavedata=array(
						'facul_id'=>$facultyid,
						'leavefrom'=>$fromdate,
						'leaveto'=>$todate,
						'numofdays'=>$numofdays,
						'leavetype'=>$leavetype,
						'leavereason'=>$leavereason
					);
					$this->load->model('addleavedata');
					$this->addleavedata->insertdata($emp_leavedata);
					echo '<script>alert("Data Saved	Select Alternate Faculty"); window.location.href="'.base_url().'employee/dashboard";</script>';
				}
			else
			{
			$file_data=$this->upload->data();
			$file_name=$file_data['file_name'];
			$emp_leavedata=array(
				'facul_id'=>$facultyid,
				'leavefrom'=>$fromdate,
				'leaveto'=>$todate,
				'numofdays'=>$numofdays,
				'leavetype'=>$leavetype,
				'leavereason'=>$leavereason,
				'documents'=>$file_name
			);
			$this->load->model('addleavedata');
			$this->addleavedata->insertdata($emp_leavedata);
			echo '<script>alert("Data Saved	Select Alternate Faculty"); window.location.href="'.base_url().'employee/dashboard";</script>';
			}
		}
	}

	//To store timetable
	public function storetimetable()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$facultyid=$this->session->userdata('emp_id');
		$day=$this->input->post('timetabledays');
		$s1subject=$this->input->post('subject_s1');
		$s1section=$this->input->post('section_s1');
		$s2subject=$this->input->post('subject_s2');
		$s2section=$this->input->post('section_s2');
		$s3subject=$this->input->post('subject_s3');
		$s3section=$this->input->post('section_s3');
		$s4subject=$this->input->post('subject_s4');
		$s4section=$this->input->post('section_s4');
		$s5subject=$this->input->post('subject_s5');
		$s5section=$this->input->post('section_s5');
		$s6subject=$this->input->post('subject_s6');
		$s6section=$this->input->post('section_s6');
		$s7subject=$this->input->post('subject_s7');
		$s7section=$this->input->post('section_s7');
		$s8subject=$this->input->post('subject_s8');
		$s8section=$this->input->post('section_s8');
		// $this->load->model('AddTimetable');
		$emptimetabledetails=$this->AddTimetable->getemptimetablebyday($this->session->userdata('emp_id'),$day);
		if($emptimetabledetails==1)
		{
			echo '<script>alert("Already Exists"); window.location.href="'.base_url().'employee/timetable_page";</script>';
			// echo '<script>alert("Already Exists");</script>';
			// $this->timetable_page();
		}
		else
		{
			$emp_timetable=array(
				'facultyid'=>$facultyid,
				's1subject'=>$s1subject,
				's1section'=>$s1section,
				's2subject'=>$s2subject,
				's2section'=>$s2section,
				's3subject'=>$s3subject,
				's3section'=>$s3section,
				's4subject'=>$s4subject,
				's4section'=>$s4section,
				's5subject'=>$s5subject,
				's5section'=>$s5section,
				's6subject'=>$s6subject,
				's6section'=>$s6section,
				's7subject'=>$s7subject,
				's7section'=>$s7section,
				's8subject'=>$s8subject,
				's8section'=>$s8section,
				'day'=>$day
			);
			$this->AddTimetable->insertTimetable($emp_timetable);
			echo '<script>alert("Added"); window.location.href="'.base_url().'employee/timetable_page";</script>';
		 	// echo '<script>alert("Added");</script>';
		 	// $this->timetable_page();
		}
		
	}

	public function updateprofile()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$presentempid=$this->session->userdata('emp_id');
		$updateemail=$this->input->post('updateemail');
		$updatenumber=$this->input->post('updatenumber');
		$updatedepartment=$this->input->post('updatedepartment');
		if (($updateemail != '') && ($updatenumber != '') && ($updatedepartment != ''))
		{
			$faculty_data=array(
				'faculty_email'=>$updateemail,
				'faculty_phone'=>$updatenumber,
				'faculty_department'=>$updatedepartment,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if (($updateemail == '') && ($updatenumber != '') && ($updatedepartment == ''))
		{
			$faculty_data=array(
				'faculty_phone'=>$updatenumber
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if (($updateemail != '') && ($updatenumber == '') && ($updatedepartment == ''))
		{
			$faculty_data=array(
				'faculty_email'=>$updateemail,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if(($updateemail == '') && ($updatenumber == '') && ($updatedepartment != ''))
		{
			$faculty_data=array(
				'faculty_department'=>$updatedepartment,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if(($updateemail != '') && ($updatenumber == '') && ($updatedepartment != ''))
		{
			$faculty_data=array(
				'faculty_email'=>$updateemail,
				'faculty_department'=>$updatedepartment,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if(($updateemail != '') && ($updatenumber != '') && ($updatedepartment == ''))
		{
			$faculty_data=array(
				'faculty_email'=>$updateemail,
				'faculty_phone'=>$updatenumber,
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if(($updateemail == '') && ($updatenumber != '') && ($updatedepartment != ''))
		{
			$faculty_data=array(
				'faculty_phone'=>$updatenumber,
				'faculty_department'=>$updatedepartment,
				
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultydata($faculty_data,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else if(($updateemail == '') && ($updatenumber == '') && ($updatedepartment == ''))
		{
			$this->Profile_Page();
		}

	}

	public function updatepassword()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$presentempid=$this->session->userdata('emp_id');
		$newpassword=$this->input->post('newpassword');
		$confirmnewpassword=$this->input->post('confirmnewpassword');
		if(($newpassword==$confirmnewpassword) && ($newpassword!='' && $confirmnewpassword!=''))
		{
			$updatefacultypassword=array(
				'faculty_password'=>$newpassword
			);
			$this->load->model('AddEmployee');
			$this->AddEmployee->updatefacultypassword($updatefacultypassword,$presentempid);
			echo '<script>alert("Updated Sucessfully"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Updated Sucessfully");</script>';
			// $this->Profile_Page();
		}
		else
		{
			echo '<script>alert("Update Failed"); window.location.href="'.base_url().'employee/Profile_Page";</script>';
			// echo '<script>alert("Update Failed");</script>';
			// $this->Profile_Page();
		}
	}

	//to retrive leave application
	public function retriveapplication($presentleaveid)
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$this->load->model('leavedata');
		$res=$this->leavedata->afterretrival($presentleaveid);
		// print_r($res);
		if ($res)
		{
			foreach($res as $row)
			{
					if("$row->status"=="Approved")
					{
					$count=$row->numofdays;
					$newdays=$row->faculty_leavetaken-$count;
					$updateleavetaken=array(
					'faculty_leavetaken'=>$newdays,
					'faculty_leaveleft'=>$row->faculty_leaveleft+$count,
					);
					$this->leavedata->updateleavecount($row->facul_id,$updateleavetaken);
					$this->leavedata->retriveapplication($presentleaveid);
					echo '<script>alert("Application retrived Sucessfully"); window.location.href="'.base_url().'employee/leavestatus";</script>';
					}
					else
					{
					$this->leavedata->retriveapplication($presentleaveid);
					echo '<script>alert("Application retrived Sucessfully"); window.location.href="'.base_url().'employee/leavestatus";</script>';
					}
			}
			
		}
		
	}

	public function retrivedates()
	{
		$dataid=$this->input->post('presentdataid');
		$this->load->model('leavecount');
		$value=$this->leavecount->retrivedates($dataid);
		if($value)
		{
			foreach($value as $row)
			{
				$users_arr[] = array("from" => $row->leavefrom, "to" => $row->leaveto);
			}
			echo json_encode($users_arr);
		}
	}

	public function retrievealternatefaculty()
	{
		$presentdataid=$this->input->post('presentdata_id');
		$alternatedate=$this->input->post('alternate_date');
		$alternatehour=$this->input->post('alternate_hour');
		$dt = strtotime($alternatedate);
		$day = date("D", $dt);
		$get_alternate_faculty = $this->leavedata->get_alternate_faculty($presentdataid,$alternatedate,$alternatehour,$day);
		if($get_alternate_faculty)
		{
			foreach($get_alternate_faculty as $row)
			{
				$users_arr[] = array("faculty_id" => $row->faculty_id, "faculty_name" => $row->faculty_name);
			}
			echo json_encode($users_arr);
		}
	}

	public function addalternatefaculty()
	{
		if(!$this->session->userdata('emp_email'))
		redirect(base_url());
		$presentdataid=$this->input->post('pendingleave');
		$presentuserid=$this->session->userdata('emp_id');
		$alternatehour=$this->input->post('alternatehour');
		$alternatedate=$this->input->post('alternatedate');
		$alternatefacultyid=$this->input->post('alternatefaculty');
		$rand=rand(0000,9999);
		$hash=md5($rand);
		$alternatefaculty_data=array(
			'applicantid'=>$presentuserid,
			'presentdata_id'=>$presentdataid,
			'alternatefacultyid'=>$alternatefacultyid,
			'date'=>$alternatedate,
			'hour'=>$alternatehour,
			'alternate_status'=>'pending',
			'hash'=>$hash,
		);
		$this->load->model('alternatefacultydata');
		$res=$this->alternatefacultydata->checkifexists($alternatefacultyid,$alternatehour,$alternatedate);
		if($res==1)
		{
			echo '<script>alert("Already Added This Faculty"); window.location.href="'.base_url().'employee/dashboard";</script>';
		}
		else
		{
			$res=$this->alternatefacultydata->addalternatefaculty($alternatefaculty_data);
			if($res==1)
			{
				$this->load->model('alternatefacultydata');
				$altdata=$this->alternatefacultydata->getfacultybyid($alternatefacultyid);
				foreach($altdata as $alt)
				{
					$facid=$this->session->userdata('emp_id');
					$dt = strtotime($alternatedate);
					$day = date("D", $dt);
					$section=$this->alternatefacultydata->getsectiondetails($presentuserid,$day,$alternatehour);
					$details=$this->alternatefacultydata->getfacultybyid($facid);
					foreach($section as $s)
					{
						$st='s'.substr($alternatehour,1,1).'section';					
						foreach($details as $d)
						{
							$this->load->model('sendmailmodel');
							$sec="s".substr($alternatehour,1,1)."section";
							$id=$alt->faculty_email;
							$data = array(
								'md5'=> $hash,
								'name'=>$d->faculty_name,
								'mailid'=>$d->faculty_email,
								'phoneno'=>$d->faculty_phone,
								'hour'=>$alternatehour,
								'date'=>$alternatedate,
								'sect'=>$s->$st
							);
							$body=$this->load->view('email.php',$data,TRUE);
							$subject='You Have Been Requested For Alternate Faculty';
							$fin=$this->sendmailmodel->sendemails($id,$body,$subject);
							if($fin==1)
							{
								echo '<script>alert("Sent Sucessful"); window.location.href="'.base_url().'employee/dashboard";</script>';
							}
						}
					}
					
				}
			}
			echo '<script>alert("Alternate faculty added"); window.location.href="'.base_url().'employee/dashboard";</script>';
		}
		
	}
}