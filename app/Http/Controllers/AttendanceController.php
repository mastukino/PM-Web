<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\AttendanceTrait;
use App\Models\EmployeePresence;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    use AttendanceTrait;

    public function index()
    {
        $data = EmployeePresence::query();
        if(Auth::user()->role == "employee")
        {
            $data->where('user_id',Auth::id());
        }

        return view('presences.index')
                ->with(
                    [
                        'data' => $data->get(),
                        'checkin' => $this->absenceStatus('check_in'),
                        'checkout' => $this->absenceStatus('check_out')
                    ]
                );
    }

    public function store(Request $request)
    {

        if($request->has('check_in'))
        {
            $this->checkin();
        }

        if($request->has('check_out'))
        {
            $this->checkout();
        }

        return redirect()->back()->withSuccess('Record saved');
    }
}
