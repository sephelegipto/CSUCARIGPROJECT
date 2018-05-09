<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function dashboard()
	{
		$id = Auth::user()->UserID;
		$count = DB::table('temployees')
			->where('DesignationID', 1)
			->where('EmployeeID', $id)
			->count();

		return view('dashboard/dashboard', ['CheckIfDean' => $count]);
	}
}
