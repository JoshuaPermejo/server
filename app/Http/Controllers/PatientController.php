<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function store(Request $request) {
        $data = $request->validate([
            "patientId" => "required",
            "patientName" => "required",
            "emailAddress" => "required",
            "ages" => "required"
        ]);

        $result = Patient::create($data);

        return response()->json($result, 200);
    }

    public function put(Request $request, $id) {
        $data = $request->validate([
            "patientId" => "required",
            "patientName" => "required",
            "emailAddress" => "required",
            "ages" => "required"
        ]);

        $patient = Patient::find($id);
        $patient->update($data);

        return response()->json($patient, 200);
    }

    public function destroy($id) {
        $patient = Patient::find($id);
        $patient->delete();

        return response()->json($patient, 200);
    }
}
