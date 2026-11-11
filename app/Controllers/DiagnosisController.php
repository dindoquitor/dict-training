<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class DiagnosisController extends BaseController
{
    public function index(): string
    {
        $diagnosis = new \App\Models\DiagnosisModel();
        $ddata['result'] = $diagnosis->findAll();
        return view('diagnosis/diagnosis', $ddata);
    }

    public function add()
    {

        if ($this->request->getMethod() === 'GET') {
            return view('diagnosis/diagnosisAdd');
        } else {
            helper('form');

            $diagnosisModel = new \App\Models\DiagnosisModel();

            $did = $this->request->getPost('diagnosisID');

            $diagnosisdata = [

                'diagnosisCode' => $this->request->getPost('diagnosisCode'),
                'diagnosisName' => $this->request->getPost('diagnosisName'),
                'category' => $this->request->getPost('category'),
            ];

            $diagnosisModel->insert($diagnosisdata);

            return redirect()->to('/diagnosis')->with('success', 'Diagnosis sucessfully added.');
        }
    }

    public function edit()
    {

        $diagnosisModel = new \App\Models\DiagnosisModel();

        if ($this->request->getMethod() === 'GET') {
            $ddata['result'] = $diagnosisModel->find($_GET['id']);
            return view('diagnosis/diagnosisEdit', $ddata);
        } else {
            helper('form');

            $did = $this->request->getPost('diagnosisID');

            $diagnosisdata = [

                'diagnosisCode' => $this->request->getPost('diagnosisCode'),
                'diagnosisName' => $this->request->getPost('diagnosisName'),
                'category' => $this->request->getPost('category'),
            ];

            $diagnosisModel->update($did, $diagnosisdata);

            return redirect()->to('/diagnosis')->with('success', 'Diagnosis successfully edited');
        }
    }
    public function delete()
    {
        $diagnosisModel = new \App\Models\DiagnosisModel();

        if ($this->request->getMethod() === 'GET') {
            $diagnosisModel->delete($_GET['id']);

            $diagnosis = new \App\Models\DiagnosisModel();
            $mdata['result'] = $diagnosis->findAll();

            return redirect()->to('/diagnosis')->with('success', 'Diagnosis sucessfully deleted');
        }
    }
}
