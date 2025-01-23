<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\HomeAppointment;
use App\Models\Investigation;
use App\Models\UserInvestigation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AppointmentController extends Controller
{
    public function index()
    {
        $users = User::with('homeAppointments', 'mytests')->get();
        return view('admindashboard.appointmentslist', compact('users'));
    }
    public function viewappo($id)
    {
        // Find the appointment by its ID
        $appointment = HomeAppointment::with('investigations')->find($id);
    
        if (!$appointment) {
            return redirect()->route('appointment.index')->withErrors(['error' => 'Appointment not found.']);
        }
    
        return view('admindashboard.appointment', compact('appointment'));
    }
    public function create(){
        return view('make appointment');
    }
    public function store(Request $request)
{
    $userid = Auth::user()->id;
    
        $userInvestigations = UserInvestigation::where('user_id', $userid)->get();
    
        if ($userInvestigations->isEmpty()) {
            return back()->withErrors(['error' => 'No investigations found for this user.']);
        }
    
        $totalCost = $userInvestigations->sum(function ($userInvestigation) {
            return $userInvestigation->investigation->price;
        });
    // Create a new HomeAppointment instance
    $appointment = new HomeAppointment();
    $appointment->first_name = $request->input('first_name');
    $appointment->last_name = $request->input('last_name');
    $appointment->email = $request->input('email');
    $appointment->phone_number = $request->input('phone_number');
    $appointment->gender = $request->input('gender');
    $appointment->date_of_birth = "{$request->year}-{$request->month}-{$request->day}";
    $appointment->address = $request->input('address');
    $appointment->date = $request->input('date');
    $appointment->time = $request->input('time');
    $appointment->user_id = $userid;
    
    $appointment->total_cost = $totalCost;
    $appointment->save();

    foreach ($userInvestigations as $userInvestigation) {
        DB::table('home_appointment_investigations')->insert([
            'home_appointment_id' => $appointment->id,
            'investigation_id' => $userInvestigation->investigation_id,
            'cost' => $userInvestigation->investigation->price, // افترض أن الحقل 'price' موجود في جدول التحاليل
        ]);
    }

    return view('make appointment')->with('success', 'Appointment created successfully!');
}

}
