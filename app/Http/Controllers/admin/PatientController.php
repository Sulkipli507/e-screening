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
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);
        Patient::create($request->all());
        return redirect()->route('patient-index')->with('status', 'Sukses insert data pasien');
    }

    public function index(Request $request){
        $patients = Patient::all();
        if($request->has('date')){
            $date = $request->input('date');
            $patients = $patients->where('created_at', 'like', '%'.$date.'%');
        }
        return view('admin.patient.index', compact('patients'));
    }

    public function edit($id){
        $patient = Patient::where('id',$id)->first();
        return view('admin.patient.edit', compact('patient'));
    }
    
    public function update(Request $request, $id){
        $patient = Patient::where('id', $id)->first();
        $patient->update($request->all());
        return redirect()->route('patient-index')->with('status', 'Sukses update data pasien');
    }

    public function destroy($id){
        $patient = Patient::where('id', $id)->first();
        $patient->delete();
        return redirect()->route('patient-index')->with('status', 'Sukses hapus data pasien');
    }
}