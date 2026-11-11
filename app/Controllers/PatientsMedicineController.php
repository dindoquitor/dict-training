<?php

namespace App\Controllers;

class PatientsMedicineController extends BaseController
{
    public function index(): string
    {   
        $medicineModel = new \App\Models\PatientMedicineModel();
        $data['result'] = $medicineModel->getPatientMedicineRecords();
        return view('patients_medicine/patients_medicine', $data);
    }

}
