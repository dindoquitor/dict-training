<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class PatientsDiagnosisController extends BaseController
{
    public function index()
    {
        $model = new \App\Models\PatientDiagnosisModel();
        $data['result'] = $model->getPatientDiagnosis();
        return view('patients_diagnosis/patients_diagnosis', $data);
    }

    public function add()
    {

        $patientModel = new \App\Models\PatientModel();
        $diagnosisModel = new \App\Models\DiagnosisModel();
        $data['patients'] = $patientModel->findAll();
        $data['diagnosis'] = $diagnosisModel->findAll();

        return view('patients_diagnosis/add', $data);
    }


    public function store()
    {

        helper('form');

        $patientDiagnosisModel = new \App\Models\PatientDiagnosisModel();

        $patientDiagnosisData = [
            'patientid' => $this->request->getPost('patientid'),
            'diagnosisID' => $this->request->getPost('diagnosisID'),
            'dateDiagnosed' => $this->request->getPost('dateDiagnosed'),
            'remarks' => $this->request->getPost('remarks')
        ];

        $patientDiagnosisModel->insert($patientDiagnosisData);

        return redirect()->to('/patients_diagnosis')->with('success', 'Patient successfully added!');
    }

    public function edit()
    {
        $patientDiagnosisModel = new \App\Models\PatientDiagnosisModel();
        $patientModel = new \App\Models\PatientModel();
        $diagnosisModel = new \App\Models\DiagnosisModel();

        if ($this->request->getMethod() === 'GET') {

            $id = $this->request->getGet('id');

            $data['patients'] = $patientModel->findAll();
            $data['diagnosis'] = $diagnosisModel->findAll();
            $data['patientDiagnosis'] = $patientDiagnosisModel->find($_GET['id']);

            return view('patients_diagnosis/edit', $data);
        }else{
            helper('form');
            
            $id = $this->request->getPost('patient_diagnosis_id');

            $patientDiagnosisData = [
                'patientid' => $this->request->getPost('patientid'),
                'diagnosisID' => $this->request->getPost('diagnosisID'),
                'dateDiagnosed' => $this->request->getPost('dateDiagnosed'),
                'remarks' => $this->request->getPost('remarks')
            ];

            $patientDiagnosisModel->update($id, $patientDiagnosisData);

            return redirect()->to('/patients_diagnosis')->with('success', 'Patient Diagnosis successfully updated!');

        }
    }

    public function delete()
    {
        $patientDiagnosisModel = new \App\Models\PatientDiagnosisModel();
        $id = $this->request->getGet('id');
        $patientDiagnosisModel->delete($id);
        return redirect()->to('/patients_diagnosis')->with('success', 'Patient Diagnosis successfully deleted!');
    }
}
