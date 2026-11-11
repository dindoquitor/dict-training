<?php

namespace App\Controllers;

class PatientController extends BaseController
{
    public function index(): string
    {

        $patient = new \App\Models\PatientModel();
        $data['result'] = $patient->findAll();
        return view('homepage', $data);
    }

    public function add()

    {
        if ($this->request->getMethod() === 'GET') {
            return view('patients/add');
        } else {

            helper('form');

            $patientModel = new \App\Models\PatientModel();

            $patientdata = [
                'patient_fname' => $this->request->getPost('patient_fname'),
                'patient_mname' => $this->request->getPost('patient_mname'),
                'patient_lname' => $this->request->getPost('patient_lname'),
                'patient_gender' => $this->request->getPost('patient_gender'),
            ];

            $patientModel->insert($patientdata);

            return redirect()->to('/')->with('success', 'Patient successfully added');
        }
    }

    public function edit()

    {
        $patientModel = new \App\Models\PatientModel();

        if ($this->request->getMethod() === 'GET') {
            $data['result'] = $patientModel->find($_GET['id']);
            return view('patients/edit', $data);
        } else {

            helper('form');

            $id = $this->request->getPost('patientid');

            $patientdata = [
                'patient_fname' => $this->request->getPost('patient_fname'),
                'patient_mname' => $this->request->getPost('patient_mname'),
                'patient_lname' => $this->request->getPost('patient_lname'),
                'patient_gender' => $this->request->getPost('patient_gender'),
            ];

            $patientModel->update($id, $patientdata);

            return redirect()->to('/')->with('success', 'Patient successfully edited');
        }
    }

    public function delete()

    {
        $patientModel = new \App\Models\PatientModel();

        if ($this->request->getMethod() === 'GET') {
            $patientModel->delete($_GET['id']);


            $patient = new \App\Models\PatientModel();
            $data['result'] = $patient->findAll();
            return view('homepage', $data);
        }
    }
}
