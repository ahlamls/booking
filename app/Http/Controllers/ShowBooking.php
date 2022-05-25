<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingDate;
use App\Models\BookingTime;
use App\Models\Slots;

use Carbon\Carbon;
class ShowBooking extends Controller
{
    public function index() {
        $dates = BookingDate::where( 'date', '>', Carbon::now()->subDays(30))
        ->with("times")->get();
        $slots = Slots::where("user_id",1)->get();
        $dateslist = $dates->toArray();
        
        //overlay the dates and slots
        foreach ($dates as $datekey => $date) {
            $times = $date->times;
            foreach ($times as $timekey => $time) {
                $found = 0;
                foreach ($slots as $slot) {
                    if ($found == 0) {
                        if ($time->id == $slot->time_id) {
                            $dateslist[$datekey]["times"][$timekey]['available'] = false;
                            $dateslist[$datekey]["times"][$timekey]['description'] = $slot->description;
                            $found = 1;        
                        } else {
                        $dateslist[$datekey]["times"][$timekey]['available'] = true;
                        }
                    }
                }

            }
        } 
        return response()->json($dateslist);
        
    }
}
