<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use DB;
use Auth;
use Crypt;

class InvoiceController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();
        if ($user) {
            $user = $user->id;
            $data['toInvocie'] = DB::table('tasks')->where('patient_id', $user)->where('deleteStaus', '1')->where('toInvoiceStatus', '0')->get();
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $id = Crypt::decrypt($id);
            $data['toInvocie'] = DB::table('tasks')->where('patient_id', $id)->where('deleteStaus', '1')->where('toInvoiceStatus', '0')->get();
        } else {
            $data['toInvocie'] = DB::table('tasks')->where('deleteStaus', '1')->where('toInvoiceStatus', '0')->get();
        }

        $checkDoctor = Auth::guard('doctor')->user();
        // $data['toInvocie'] = DB::table('tasks')->orderBy('id','DESC')->where('deleteStaus','1')->where('toInvoiceStatus','0');
        // $data['toInvocie']=$data['toInvocie']->get();



        // Second Tab
        $data['PaymentType'] = $request->input('PaymentType');

        $data['allInvoice'] = Invoice::with(['tasks' => function($query) {
            $query->where('deleteStaus', '1')->where('toInvoiceStatus', '1');
        }]);
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $id = Crypt::decrypt($id);
            $data['allInvoice'] = $data['allInvoice']->where('patient_id', $id);
        }
        
        if ($request->input('checkFilter')) {
            $data['allInvoice'] = $data['allInvoice']->where('paidStatus', $request->input('PaymentType'));
        }
        
        $data['allInvoice'] = $data['allInvoice']->orderBy('created_at', 'DESC')->get();
        // dd($data['allInvoices']);
        


        $data['unpaidStatus'] = DB::table('tasks')->where('toInvoiceStatus', '1')->where('paidStatus', '0')->count();

        $data['totalPatient'] = DB::table('users')->count();

        $data['paidStatus'] = DB::table('tasks')->where('toInvoiceStatus', '1')->where('paidStatus', '1')->count();



        $data['totalRased'] = DB::table('tasks')->where('toInvoiceStatus', '1')->sum('finalAmount');
        $data['unpaidfinalAmount'] = DB::table('tasks')->where('paidStatus', '0')->sum('finalAmount');
        $data['paidfinalAmount'] = DB::table('tasks')->where('paidStatus', '1')->sum('finalAmount');


        //  invoices

        $getTask = DB::table('tasks')->select('id', 'task')->get();
        foreach ($getTask as $allgetTask) {
            $data['sumAmount'] = DB::table('pathology_price_list')->whereId($allgetTask->task)->sum('price');
        }


        $year = $request->input('yearName') ?? date('Y');
        for ($i = 1; $i <= 12; $i++) {
            $checkInvoice[]    = DB::table('tasks')->where('toInvoiceStatus', '1')->whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
        }
        $currentYear = date('Y');
        $startYear = 2023;
        $years = range($startYear, $currentYear);

        return view('back/invoice', $data, compact('checkInvoice', 'year', 'years'));
    }

    public function printInvoice(Request $request, $id)
    {
        $data['printData'] =  Invoice::with('tasks')->whereId($id)->first();
        return view('back/print-invoice', $data);
    }

    public function deleteInvoice(Request $request)
    {

        $id = $request->input('common');
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->route('user.invoice')->with('success', 'Invoice Deleted Successfully');
    }
}
