<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeBookingOrderController extends Controller
{
    private $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function setOrder()
    {
        return view('pages.booking.create');
    }
    public function store(Request $request)
    {
        $str = substr( ($request->date),  0, 10);
        $test = date('Y-m-d',strtotime($str));
        $dataInert = [
            'b_date' => $test,
            'b_time' => $request->time,
            'b_people' => $request->people,
            'b_name' => $request->name,
            'b_email' => $request->email,
            'b_phone' => $request->phone,
            'b_note' => $request->b_note,
        ];
        $this->booking->create($dataInert);
        toastr()->success('Success Create');
        return view('pages.booking.success');

    }
}
