<?php

namespace App\Controllers;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function user_dashboard()
    {
		
	$model=new UserModel();
	$users= $model->findAll();
        return view('Dashboard/user_dashboard',['users'=>$users]);
    }
	


}