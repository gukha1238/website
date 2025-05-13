<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserDetailsModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
	
	public function register()
    {
		
		//get
		if($this->request->getMethod()=="get"){
		    return view('register');
		}
	else if($this->request->getMethod()=="post"){
		
		if($this->validate([
		"username"=>"required",
		"email"=>"required|valid_email",
		"password"=>"required|min_length[5]|max_length[20]",
		"cpassword"=>"matches[password]"
		
		])){
		//submit the form
        $username=$this->request->getVar("username");
        $email=$this->request->getVar("email");
        $password=$this->request->getVar("password");
        
        //  now save the data at the database using model	
		
		$data=[
		"username"=>$username,
		"email"=>$email,
		"password"=>$password
		
		];
        $model=new UserModel();
        $model->insert($data);
		$session = session();
		$session->set("success_message","User registered successfully");
        $session->markAsFlashdata('success_message');	
        return view("register");		
	    }
		
	    else{
		return redirect()->back()->withInput(); 
		
	}
	}		
	}	
       
    	public function login()
    {
		if($this->request->getMethod()=="get"){
			return view('login');
		}
		else if($this->request->getmethod()=="post"){
			  //validate
		if($this->validate([
		"email"=>"required|valid_email",
		"password"=>"required",
		
		
		])){
			
			$model=new UserModel();#
		
		     $record=$model->where("email",$this->request->getVar("email"))
			->where("password",$this->request->getVar("password"))
			 ->first();
			 
			 var_dump($record);
			 $session=session();
			 if(! is_null($record)){
				 // data found at database 
				 $sess_data=[
				 "user_id"=>$record['id'],
				 "username"=>$record['username'],
				   "email"=>$record["email"],
				   "user_type"=>$record["user_type"],
				   "loginned"=>"loginned"
				];
				
				$session->set($sess_data);
				if($record['user_type']=="user"){
					// go to user page
					$url="user_dashboard";
					
				}
				else if($record['user_type']=="admin"){
					// go to admin page
					$url="admin_dashboard";
				}
				return redirect()->to('base_url'($url));
				  }
			 else{
				 $session->set("failed_message","Record does not match,try again");
                 $session->markAsFlashdata('failed_message');	
				 return redirect()->back()->withInput();
			 }
		}
				 
		else{
			return redirect()->back()->withInput();
			
    }
    }
	}
	public function logout(){
		  $session=session();
		  session_unset();
		  session_destroy();
		  return redirect()->to(base_url());
	}
	
    public function profile()
    {
        $session = session();

        if ($this->request->getMethod() == "get") {
            return view("profile");
        } else if ($this->request->getMethod() == "post") {
            $country = $this->request->getVar("country");
            $state = $this->request->getVar("state");
            $district = $this->request->getVar("district");
            $pincode = $this->request->getVar("pincode");
            $mobile = $this->request->getVar("mobile");
            $local_address = $this->request->getVar("local_address");
            $permanent_address = $this->request->getVar("permanent_address");
			
			
			
			
		// Debug statements
        log_message('debug', 'Local Address: ' . $local_address);
        log_message('debug', 'Permanent Address: ' . $permanent_address);
		

            $model = new UserDetailsModel();
            $user_id = $session->get('user_id'); 

            $record = $model->where("user_id", $user_id)->first();

            $data = [
                'user_id' => $user_id,
                'country' => $country,
                'state' => $state,
                'district' => $district,
                'pincode' => $pincode,
                'mobile' => $mobile,
                'local_address' => $local_address,
                'permanent_address' => $permanent_address
            ];

            try {
                if (!is_null($record)) {
                    // update
                    $model->update($user_id, $data);
                } else {
                    // insert
                    $model->insert($data);
                }
            } catch (\Exception $e) {
                // handle exception
                log_message('error', $e->getMessage());
                return redirect()->back()->with('error', 'An error occurred while updating your profile.');
            }

            return redirect()->to(base_url("profile"));
        }
    }
}

			
			
			
