<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\superAdmin\Doctor;
use App\Models\User;
use App\Models\BookAppointment;
class CalendarController extends Controller
{
    //
    public function index(Request $request)
    {

        
       
        $doctors=Doctor::select('id','name')->where('user_type','doctor')->orderBy('id','desc')->get();
        $patients=User::select('id','name')->orderBy('id','desc')->get();
     
        return view('back/calendar',compact('doctors','patients'));
    }

   
    public function createOrUpdateEvent(Request $request)
    {
        $eventId = $request->input('event_id'); 
        $eventData = [
            'patient_id' => $request->input('patient_id'),
            'priority' => $request->input('priority'),
            'appointment_type' => $request->input('appointment_type'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'start_time' => $request->input('start_time'),
            'end_date' => $request->input('end_date'),
            'end_time' => $request->input('end_time'),
            'cost' => $request->input('cost'),
            'code' => $request->input('code'),
            'clinician_id' => $request->input('clinician_id'),
            'confirmation' => isset($request->confirmation) ? 'yes' : 'no',
        ];

       
        if ($eventId) {
            $event = BookAppointment::find($eventId);
            if (!$event) {
                return response()->json(['error' => 'Event not found'], 404);
            }
            $event->update($eventData);
            $message = 'Event updated successfully';
        } else {
           
            $event = BookAppointment::create($eventData);
            $message = 'Event created successfully';
        }

        return response()->json(['message' => $message, 'event' => $event], 200);
    }

    public function deleteEvent(Request $request, $id)
    {
        $event = BookAppointment::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully'], 200);
    }

    public function getEvents(Request $request)
    {
       
       

            $events = BookAppointment::select(
              'id',
              'patient_id',
              'doctor_id',
              'priority as title',
              'appointment_type',
              'location',
              'start_date as start',
              'start_time',
              'end_date as end',
              'end_time',
              'cost',
              'code',
              'clinician_id',
              'confirmation'
          )->get();
          
        return response()->json($events);
    }
}
