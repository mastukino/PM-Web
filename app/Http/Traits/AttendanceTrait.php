<?php

namespace App\Http\Traits;

use App\User;
use App\Models\EmployeePresence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

trait AttendanceTrait
{
    public function absenceStatus($type)
    {
        // Check today's checkin
        $userPresence = EmployeePresence::where('user_id',Auth::id())
                        ->whereDate($type,Carbon::today())
                        ->first();

        return $userPresence;
    }

    public function checkin()
    {
        $userPresence = new EmployeePresence();
        $userPresence->user_id = Auth::id();
        $userPresence->check_in = Carbon::now();
        $userPresence->save();

        return $userPresence;
    }

    public function checkout()
    {
        $userPresence = $this->absenceStatus('check_in');
        $userPresence->check_out = Carbon::now();
        $userPresence->save();

        return $userPresence;
    }
}
