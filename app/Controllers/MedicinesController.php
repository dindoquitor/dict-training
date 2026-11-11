<?php

namespace App\Controllers;

use LDAP\Result;
use PHPUnit\TextUI\Help;

class MedicinesController extends BaseController
{
    public function index(): string
    {
        $medicine = new \App\Models\MedicineModel();
        $mdata['result'] = $medicine->findAll();
        return view('medicine/medicine', $mdata);
    }

    public function add()

    {

        if ($this->request->getMethod() === 'GET') {
            return view('medicine/add');
        } else {
            helper('form');

            $medicineModel = new \App\Models\MedicineModel();

            $mid = $this->request->getPost('medicineid');

            $medicinedata = [

                'medecine_name' => $this->request->getPost('medecine_name'),
                'generic_name' => $this->request->getPost('generic_name'),
                'brand_name' => $this->request->getPost('brand_name'),
                'dosage' => $this->request->getPost('dosage'),
            ];

            $medicineModel->insert($medicinedata);

            return redirect()->to('/medicine')->with('success', 'Medicine sucessfully added.');
        }
    }

    public function edit()
    {

        $medicineModel = new \App\Models\MedicineModel();

        if ($this->request->getMethod() === 'GET') {
            $mdata['result'] = $medicineModel->find($_GET['id']);
            return view('medicine/edit', $mdata);
        } else {
            helper('form');

            $mid = $this->request->getPost('medicineid');

            $medicinedata = [

                'medecine_name' => $this->request->getPost('medecine_name'),
                'generic_name' => $this->request->getPost('generic_name'),
                'brand_name' => $this->request->getPost('brand_name'),
                'dosage' => $this->request->getPost('dosage'),
            ];

            $medicineModel->update($mid, $medicinedata);

            return redirect()->to('/medicine')->with('success', 'Patient successfully edited');
        }
    }


    public function delete()
    {

        $medicineModel = new \App\Models\MedicineModel();

        if ($this->request->getMethod() === 'GET') {
            $medicineModel->delete($_GET['id']);

            $medicine = new \App\Models\MedicineModel();
            $mdata['result'] = $medicine->findAll();

            return redirect()->to('/medicine')->with('success', 'Medicine sucessfully deleted');
        }
    }
}
