<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AdminController extends Controller
{
	public function StudentList(){
		return DB::select("call spStudentslistViewAllORSearch('Student List','')");	
	}

	public function CourseList(){
		return  DB::select("call spLibraryViewAllORSearch('courses','')");


	}

	public function EmployeeList(){
		return DB::select("call spLibraryViewAllORSearch('Employees','')");

		
	}

	public function CollegeList(){
		return  DB::select("call spLibraryViewAllORSearch('Colleges','')");

	}

	public function BuildingList(){
		return DB::select("call spLibraryViewAllORSearch('Buildings','')");

		
	}

	public function CurriculumList(){
		return DB::select("call spLibraryViewAllORSearch('Curriculums','')");
		
	}
}
