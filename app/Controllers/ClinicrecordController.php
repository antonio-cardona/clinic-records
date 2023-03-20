<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClinicrecordModel;
use App\Helpers\HealthRules;

class ClinicrecordController extends BaseController
{
    public function index()
    {
        $model = new ClinicrecordModel();
        $data['records_detail'] = $model->orderBy('id', 'ASC')->findAll();

        return view('records/list', $data);
    }

    public function save()
    {
        helper(['form', 'url']);

        $data = [
            'name' => $this->request->getVar('txtFullName'),
            'birthdate' => $this->request->getVar('txtBirthdate'),
            'sex' => $this->request->getVar('txtSex'),
            'height' => $this->request->getVar('txtHeight'),
            'weight' => $this->request->getVar('txtWeight'),
        ];

        $model = new ClinicrecordModel();
        $save = $model->insert_data($data);

        if ($save != false) {
            $data = $model->where('id', $save)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function edit($id = null)
    {
        $model = new ClinicrecordModel();
        $data = $model->where('id', $id)->first();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function update()
    {
        helper(['form', 'url']);

        $data = [
            'name' => $this->request->getVar('txtFullName'),
            'birthdate' => $this->request->getVar('txtBirthdate'),
            'sex' => $this->request->getVar('txtSex'),
            'height' => $this->request->getVar('txtHeight'),
            'weight' => $this->request->getVar('txtWeight'),
        ];

        $model = new ClinicrecordModel();
        $id = $this->request->getVar('hdnClinicrecordId');
        $update = $model->update($id, $data);

        if ($update != false) {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false, 'data' => $data));
        }
    }

    public function delete($id = null)
    {
        $model = new ClinicrecordModel();
        $delete = $model->where('id', $id)->delete();

        if ($delete) {
            echo json_encode(array("status" => true));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function all()
    {
        $model = new ClinicrecordModel();
        $data = $model->findAll();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

    public function detail($id = null)
    {
        $model = new ClinicrecordModel();
        $data = $model->where('id', $id)->first();

        $healthRules = new HealthRules(
            $data['name'], 
            $data['birthdate'], 
            $data['sex'],
            $data['height'],
            $data['weight']
        );

        $data['recommendation_text'] = $healthRules->getRecommendation();

        if ($data) {
            echo json_encode(array("status" => true, 'data' => $data));
        } else {
            echo json_encode(array("status" => false));
        }
    }

}