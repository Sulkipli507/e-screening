<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Patient;
use Illuminate\Http\Request;
use \Barryvdh\DomPDF\Facade\Pdf;

class PatientController extends Controller
{
    public function create(){
        $disease = Disease::all();
        return view('admin.patient.create', compact('disease'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'address' => 'required',
            'disease_id' => 'required',
        ]);

        Patient::create($request->all());
        return redirect()->route('patient-index');
    }

    public function index(){
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    public function edit($id){
        $disease = Disease::all();
        $patient = Patient::where('id',$id)->first();
        return view('admin.patient.edit', compact('patient','disease'));
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

    public function downloadPdf(){
        $patients = Patient::all();
        $pdf = PDF::loadView('admin.pdf.patient', compact('patients'));
        return $pdf->download('Data-pasien.pdf');
    } 
}