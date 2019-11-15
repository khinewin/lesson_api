<?php

namespace App\Http\Controllers;

use App\Category;
use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function newDoctor(Request $request){
        $v=Validator::make($request->all(),[
           'doctor_name'=>'required',
            'phone'=>'required',
            'special'=>'required'
        ]);
        if($v->fails()){
            return response()->json($v->errors());
        }

        $d=new Doctor();
        $d->doctor_name=$request['doctor_name'];
        $d->phone=$request['phone'];
        $d->special=$request['special'];
        $d->save();
        return response()->json(['message'=>'The new doctor have been save.']);
    }

    public function newCategory(Request $request){
        $v=Validator::make($request->all(),[
            'category_name'=>'required',

        ]);
        if($v->fails()){
            return response()->json($v->errors());
        }
        $c=new Category();
        $c->category_name=$request['category_name'];
        $c->save();
        return response()->json(['message'=>'The new category have been save.']);
    }

    public function newPatient(Request $request){
        $v=Validator::make($request->all(),[
            'patient_name'=>'required',
            'age'=>'required',
            'address'=>'required',
            'category_id'=>'required',
            'doctor_id'=>'required',
            'table_no'=>'required'

        ]);
        if($v->fails()){
            return response()->json($v->errors());
        }
        $p=new Patient();
        $p->patient_name=$request['patient_name'];
        $p->age=$request['age'];
        $p->address=$request['address'];
        $p->doctor_id=$request['doctor_id'];
        $p->category_id=$request['category_id'];
        $p->table_no=$request['table_no'];
        $p->save();
        return response()->json(['message'=>"The new patient have been save."]);
    }

    public function getDoctors(){
        $dcs=Doctor::with('patient')->get();
        return response()->json($dcs);
    }
    public function getPatients(){
        $pts=Patient::OrderBy('id','desc')
            ->with('doctor')
            ->with('category')
            ->get();
        return response()->json($pts);
    }
    public function getCategories(){
        $cats=Category::with('patient')->get();
        return response()->json($cats);
    }

}
