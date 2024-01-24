<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\PathologyPriceList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Hash;
use DB;

class PathologyController extends Controller
{

    public function index(Request $req)
    {
        $data['pathologys'] = DB::table('pathologys')->orderBy('id','desc')->get();
        return view('superAdmin.pathology.index',$data);
    }

    public function add(Request $req)
    {
        $doctor = $req->except(['_token','submit']);
        // dd($doctor);
        DB::table('pathologys')->insert($doctor);
        return redirect()->back()->with('message', 'Pathology added successfully!');
    }

    public function edit(Request $request)
    {
            $id=$request->input('id');
            $pathologys = $request->except(['_token','submit']);
            DB::table('pathologys')->whereId($id)->update($pathologys);
            return to_route('pathology.index')->with('message', 'Pathology Updated Successfully.');
    }

    public function pathologyPriceList(Request $req)
    {
        $data['pathology_price_list'] = DB::table('pathology_price_list')->where('price_type','0')->get();
        if(request()->isMethod("post"))
        {
            $PathologyPriceList = $req->except(['_token','submit']);
            $id=$req->input('id');
            DB::table('pathology_price_list')->whereId($id)->update($PathologyPriceList);
            return redirect()->back()->with('message', 'Pathology price updated successfully!');
        }
        return view('superAdmin.price.pathologyPrice.index',$data);
    }

    public function addPathologyPrice(Request $req)
    {
        if(request()->isMethod("post"))
        {
            $test_name=$req->input('test_name');
            $test_name = json_decode(json_encode($test_name));
            if ($test_name) {
                $test_name = count($test_name);
            }
            for ($i = 0; $i < $test_name; $i++)
            {
                PathologyPriceList::insertGetId([
                                'test_name'     => $req->input('test_name')[$i],
                                'test_code'     => $req->input('test_code')[$i],
                                'included_tests'=> $req->input('included_tests')[$i],
                                'turnaround'    => $req->input('turnaround')[$i],
                                'note'          => $req->input('note')[$i],
                                'price'          => $req->input('price')[$i],
                                'price_type'    => '0'
                            ]);
            }

            return redirect()->route('price.pathologyPriceList')->with('message','Pathology price added successfully!');
        }
        return view('superAdmin.price.pathologyPrice.create');
    }





     public function radiologyPriceList(Request $req)
    {
        $data['pathology_price_list'] = DB::table('pathology_price_list')->where('price_type','1')->get();
        if(request()->isMethod("post"))
        {
            $PathologyPriceList = $req->except(['_token','submit']);
            $id=$req->input('id');
            DB::table('pathology_price_list')->whereId($id)->update($PathologyPriceList);
            return redirect()->back()->with('message', 'Radiology price updated successfully!');
        }
        return view('superAdmin.price.radiologyPrice.index',$data);
    }

    public function addradiologyPrice(Request $req)
    {
        if(request()->isMethod("post"))
        {
            $test_name=$req->input('test_name');
            $test_name = json_decode(json_encode($test_name));
            if ($test_name) {
                $test_name = count($test_name);
            }
            for ($i = 0; $i < $test_name; $i++)
            {
                PathologyPriceList::insertGetId([
                                'test_name'     => $req->input('test_name')[$i],
                                'test_code'     => $req->input('test_code')[$i],
                                'included_tests'=> $req->input('included_tests')[$i],
                                'turnaround'    => $req->input('turnaround')[$i],
                                'note'          => $req->input('note')[$i],
                                'price'          => $req->input('price')[$i],
                                'price_type'    => '1'
                            ]);
            }

            return redirect()->route('price.radiologyPriceList')->with('message','Radiology price added successfully!');
        }
        return view('superAdmin.price.radiologyPrice.create');
    }

}
