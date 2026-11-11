<?php

namespace App\Controllers;

class Patients extends BaseController
{
    public function index(): string
    {
        // return view('patients/patients');

        $patient = new \App\Models\PatientModel();
        $data['result'] = $patient->findAll();
        return view('patients/patients', $data);
    }

}
