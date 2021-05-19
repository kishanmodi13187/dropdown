<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\Employees;
class DepartmentsController extends Controller
{
     public function index(){

        // Fetch departments
        $departmentData['data'] = Departments::orderby("name","asc")
        			   ->select('id','name')
        			   ->get();

        // Load index view
    	return view('demo')->with("departmentData",$departmentData);
    }
     public function getEmployees($departmentid=0){

    	// Fetch Employees by Departmentid
        $empData['data'] = Employees::orderby("name","asc")
        			->select('id','name')
        			->where('department',$departmentid)
        			->get();
  
        return response()->json($empData);
     
    }
}
