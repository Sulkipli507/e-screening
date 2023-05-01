<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function create(){
        return view('admin.disease.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        Disease::create($request->all());
        return redirect()->route('disease-index');
    }

    public function index(){
        $diseases = Disease::all();
        return view('admin.disease.index', compact('diseases'));
    }

    public function edit($id){
        $disease = Disease::where('id', $id)->first();
        return view('admin.disease.edit', compact('disease'));
    }

    public function update(Request $request, $id){
        $disease = Disease::where('id', $id)->first();
        $disease->update($request->all());
        return redirect()->route('disease-index');
    }

    public function destroy($id){
        $disease = Disease::where('id', $id)->first();
        $disease->delete();
        return redirect()->route('disease-index');
    }
}
