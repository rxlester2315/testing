<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;
use App\Models\Departements;





class AdminController extends Controller
{
    


public function adminview(){

    $data = Departments::all();
    return view('admin.adminview',['data'=> $data]);

}

public function message(){

    return view('admin.message');

}



}