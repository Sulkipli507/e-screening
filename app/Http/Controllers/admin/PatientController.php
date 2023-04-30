<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create(){
        return view('admin.patient.create');
    }

    public function store(Request $request){
        Patient::create($request->all());
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
}