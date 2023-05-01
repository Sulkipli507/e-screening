<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create(){
        $disease = Disease::all();
        return view('admin.patient.create', compact('disease'));
    }
    //sampai dsni

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);
        Patient::create($request->all());
        return redirect()->route('patient-index');
    }

    public function index(){
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    public function edit($id){
        $patient = Patient::where('id',$id)->first();
        return view('admin.patient.edit', compact('patient'));
    }
    
    public function update(Request $request, $id){
        $patient = Patient::where('id', $id)->first();
        $patient->update($request->all());
        return redirect()->route('patient-index');
    }

    public function destroy($id){
        $patient = Patient::where('id', $id)->first();
        $patient->delete();
        return redirect()->route('patient-index');
    }
}