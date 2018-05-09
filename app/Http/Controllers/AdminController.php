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
	public function CurriculumSubjects(Request $request)
	{

		return DB::select("call spLibraryViewAllORSearch('Checklists','$request->ID')");
	}

	public function ImportSubjects(Request $request)
	{
		return ($request->file);
		$SubjectPeriod = collect([]);
		$file = $request->file('file')->getRealPath();

		if (!is_null($file)) {
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load($file);

			$worksheet = $spreadsheet->getActiveSheet();

			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
			$InputSubjectPeriod = collect([]);

			for ($row = 2; $row <= $highestRow; ++$row) {

				$details = collect([]);
				for ($col = 1; $col <= 23; ++$col) {
					$value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
					$details->push($value);
				}

				$ClassCode = $details[3];
				$TeacherName = $details[22];

				$TeacherID = DB::table('vemployees')->select('ID')->where('FullName', $TeacherName)->pluck('ID');

				if (!empty($details[0])) {
					if (!empty($TeacherID[0])) {

						$subjects = self::UpdateTeacher($ClassCode, $TeacherID[0]);

						$PeriodSubjectID = $subjects[1];


						$StartLec = $details[14];
						$EndLec = $details[15];
						$DayLec = $details[16];
						$RoomLec = $details[17];
						$RoomID = DB::table('trooms')->select('ID')->where('RoomCode', $RoomLec)->pluck('ID');
						$ScheduleLec = self::UpdateSchedule($PeriodSubjectID, $StartLec, $EndLec, 0, $RoomID[0], $DayLec);


						$data = $ScheduleLec->toArray();
						array_push($subjects[0][0], $data);
						$StartLab = $details[18];
						$EndLab = $details[19];
						$DayLab = $details[20];
						$RoomLab = $details[21];
						$RoomID = DB::table('trooms')->select('ID')->where('RoomCode', $RoomLab)->pluck('ID');
						if ($StartLab != '') {
							$ScheduleLab = self::UpdateSchedule($PeriodSubjectID, $StartLab, $EndLab, 1, $RoomID[0], $DayLab);
						}



						$SubjectPeriod->push($subjects[0]);
					} else {

						$subjects = self::UpdateTeacher($ClassCode, 0);

						$PeriodSubjectID = $subjects[1];


						$StartLec = $details[14];
						$EndLec = $details[15];
						$DayLec = $details[16];
						$RoomLec = $details[17];
						$RoomID = DB::table('trooms')->select('ID')->where('RoomCode', $RoomLec)->pluck('ID');
						$ScheduleLec = self::UpdateSchedule($PeriodSubjectID, $StartLec, $EndLec, 0, $RoomID[0], $DayLec);


						$data = $ScheduleLec->toArray();
						array_push($subjects[0][0], $data);
						$StartLab = $details[18];
						$EndLab = $details[19];
						$DayLab = $details[20];
						$RoomLab = $details[21];
						$RoomID = DB::table('trooms')->select('ID')->where('RoomCode', $RoomLab)->pluck('ID');
						if ($StartLab != '') {
							$ScheduleLab = self::UpdateSchedule($PeriodSubjectID, $StartLab, $EndLab, 1, $RoomID[0], $DayLab);
						}


						$SubjectPeriod->push($subjects[0]);
					}
				}



			}
		}
		return $SubjectPeriod;
	}
}
