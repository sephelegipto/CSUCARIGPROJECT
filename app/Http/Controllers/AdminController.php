<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AdminController extends Controller
{
	public function StudentList()
	{
		return DB::select("call spStudentslistViewAllORSearch('Student List','')");
	}

	public function CourseList()
	{
		return DB::select("call spLibraryViewAllORSearch('courses','')");
	}

	public function EmployeeList()
	{

		return DB::table('temployees')
			->LEFTJOIN('tpositions', 'tpositions.id', '=', 'temployees.PositionID')
			->LEFTJOIN('tdepartments', 'temployees.DepartmentID', '=', 'tdepartments.ID')
			->LEFTJOIN('tfacultyranks', 'temployees.FacultyRankID', '=', 'tfacultyranks.ID')
			->LEFTJOIN('tsalarygrades', 'temployees.SalaryGradeID', '=', 'tsalarygrades.ID')
			->LEFTJOIN('tcolleges', 'temployees.CollegeID', '=', 'tcolleges.ID')
			->LEFTJOIN('tdesignations', 'tdesignations.ID', '=', 'temployees.DesignationID')
			->LEFTJOIN('tusertypes', 'tusertypes.ID', '=', 'temployees.EmployeeTypeID')
			->select(
				'temployees.ID',
				'temployees.EmployeeID',
				'temployees.Salutation',
				'temployees.LastName',
				'temployees.FirstName',
				'temployees.MiddleName',

				'tpositions.PositionCode',
				'tpositions.PositionDescription',

				'tdepartments.DepartmentCode',
				'tdepartments.DepartmentDescription',
				'temployees.Gender',

				'temployees.Status',

				'tfacultyranks.RankCode',
				'tfacultyranks.RankDescription',

				'tsalarygrades.GradeCode',
				'tsalarygrades.GradeDescription',

				'tcolleges.CollegeCode',
				'tcolleges.CollegeDescription',
				'temployees.Address',

				'tdesignations.DesignationCode',
				'tdesignations.DesignationDescription',

				'tusertypes.Description'
			)
			->get();


	}

	public function CollegeList()
	{
		return DB::select("call spLibraryViewAllORSearch('Colleges','')");
	}

	public function BuildingList()
	{
		return DB::select("call spLibraryViewAllORSearch('Buildings','')");
	}

	public function CurriculumList()
	{
		return DB::select("call spLibraryViewAllORSearch('Curriculums','')");

	}
}
