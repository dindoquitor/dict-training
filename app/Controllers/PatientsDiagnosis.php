<?php

namespace App\Controllers;

class PatientsDiagnosis extends BaseController
{
    public function index(): string
    {
        return view('patients_diagnosis/patients_diagnosis');
    }

}
