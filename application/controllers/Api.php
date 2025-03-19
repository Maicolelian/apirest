<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
        $customers = $this->model->findAll();
        return $this->respond($customers);
	}

    public function show($id = null) {
        $$customer = $this->model->find($id);
        if ($customer) {
            return $this->respond($customer);
        }
    }

    public function create() {
        $model = new CustomerModel();
        $data = $this->request->getJSON();
        if ($model->insert($data)) {
            $response = [
                'status' => 201,
                'error'  => null,
                'messages' => [
                    'success' => 'Cliente creado',
                ],
            ];
            return $this->respondCreated($response);
        }
        return $this->fail($model->errors());
    }
    
    public function update($id = null) {
        $model = new CustomerModel();
        $data = $this->request->getJSON();
        if ($model->insert($data)) {
            $response = [
                'status' => 201,
                'error'  => null,
                'messages' => [
                    'success' => 'Cliente creado',
                ],
            ];
            return $this->respondCreated($response);
        }
        return $this->fail($model->errors());
    }
}
