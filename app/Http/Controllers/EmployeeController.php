<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::all();

        foreach ($employees as $key => $get) {
            $employees[$key]->no = $key + 1;
        }

        if ($request->ajax()) {
            return datatables()->of($employees)->make(true);
        }
        return view('index');
    }
}
