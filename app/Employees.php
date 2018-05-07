<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'vemployees';
    protected $fillable = [
        'EmployeeID', 'Salutation', 'LastName', 'FirstName',
        'MiddleName', 'PositionID', 'PositionCode', 'PositionDescription',
        'DepartmentID', 'DepartmentCode', 'DepartmentDescription', 'Gender',
        'Status', 'Status', 'RankID', 'RankCode',
        'RankDescription', 'GradeID', 'GradeCode', 'CollegeID',
        'CollegeCode', 'Address', 'DesignationID', 'DesignationDescription',
        'EmployeeTypeID', 'EmployeeTypeDescription', 'FullName'
    ];
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
