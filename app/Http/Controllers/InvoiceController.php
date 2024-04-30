<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Crypt;

class InvoiceController extends Controller
{

    public function index(Request $request)
    {


        $user = Auth::guard('web')->user();
        if($user)
        {
           $user=$user->id;
           $data['toInvoice'] = DB::table('tasks')->where('patient_id',$user)->where('toInvoiceStatus','0')->get();
        }

        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $id= Crypt::decrypt($id);
            $data['toInvoice'] = DB::table('tasks')->where('patient_id',$id)->where('toInvoiceStatus','0')->get();
        }
        else{
           $data['toInvoice'] = DB::table('tasks')->where('toInvoiceStatus','0')->get();
        }

        $checkDoctor = Auth::guard('doctor')->user();

        $data['toInvocie'] = DB::table('tasks')->orderBy('id','DESC')->where('deleteStaus','1')->where('toInvoiceStatus','0');


        $data['PaymentType']=$request->input('PaymentType');

        $data['allInvoice'] = DB::table('tasks')->orderBy('created_at', 'DESC')->where('deleteStaus','1')->where('toInvoiceStatus','1');

        if($request->input('checkFilter'))
        {
            $data['allInvoice'] =$data['allInvoice']->where('paidStatus',$request->input('PaymentType'));
        }


        if($checkDoctor->role_id=='1')
        {
           $checkPateint=DB::table('users')->where('doctor_id',$checkDoctor->id)->pluck('id');
           $data['toInvocie']=$data['toInvocie']->where('toInvoiceStatus','0')->whereIn('patient_id',$checkPateint);
           $data['allInvoice']=$data['allInvoice']->where('toInvoiceStatus','1')->whereIn('patient_id',$checkPateint);
        }

        $data['toInvocie']=$data['toInvocie']->get();
        $data['allInvoice']=$data['allInvoice']->get();
        $data['unpaidStatus'] = DB::table('tasks')->where('paidStatus','0')->count();
         $data['totalPatient'] = DB::table('users')->count();
         $data['paidStatus'] = DB::table('tasks')->where('paidStatus','1')->count();


         $data['totalRased'] = DB::table('tasks')->where('toInvoiceStatus','1')->sum('finalAmount');
         $data['unpaidfinalAmount'] = DB::table('tasks')->where('paidStatus','0')->sum('finalAmount');
         $data['paidfinalAmount'] = DB::table('tasks')->where('paidStatus','1')->sum('finalAmount');


       //  invoices

         $getTask=DB::table('tasks')->select('id','task')->get();
         foreach($getTask as $allgetTask)
         {
         $data['sumAmount'] = DB::table('pathology_price_list')->whereId($allgetTask->task)->sum('price');
         }


        for ($i = 1; $i <= 12; $i++)
        {
            $checkInvoice[]    = DB::table('tasks')->whereMonth('created_at', $i)->count();
        }

        return view('back/invoice',$data,compact('checkInvoice'));
    }

    public function printInvoice(Request $request,$id)
    {
        $data['printData'] = DB::table('tasks')->whereId($id)->first();
        return view('back/print-invoice',$data);
    }

    public function deleteInvoice(Request $request)
    {

        $id=$request->input('common');
        DB::table('tasks')->where('id',$id)->delete();
        return redirect()->route('user.invoice')->with('success', 'Invoice Deleted Successfully');


    }
}
