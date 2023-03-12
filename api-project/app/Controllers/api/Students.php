<?php

namespace App\Controllers\api;

use App\Models\Student;
use CodeIgniter\RESTful\ResourceController;

class Students extends ResourceController
{
    private $student;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    public function __construct()
    {
        $this->student = new Student();
    }
    public function index()
    {
        $students = $this->student->findAll();
        return $this->respond($students);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $student = $this->student->find($id);
        if ($student) {
            return $this->respond($student);
        }
        return $this->failNotFound('Sorry! no student found');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

        $validation = $this->validate([
            'name' => 'required',
            "email" => "required|valid_email|is_unique[students.email]|min_length[6]",
        ]);

        if (!$validation) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $student = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email')
        ];

        $studentId = $this->student->insert($student);
        if ($studentId) {
            $student['id'] = $studentId;
            return $this->respondCreated($student);
        }
        return $this->fail('Sorry! no student created');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $student = $this->student->find($id);
        if ($student) {

            $validation = $this->validate([
                'name' => 'required',
                "email" => "required|valid_email",
            ]);

            if (!$validation) {
                return $this->failValidationErrors($this->validator->getErrors());
            }

            $student = [
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email')
            ];

            $response = $this->student->save($student);
            if ($response) {
                return $this->respond($student);
            }
            return $this->fail('Sorry! not updated');
        }
        return $this->failNotFound('Sorry! no student found');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $student = $this->student->find($id);
        if ($student) {
            $response = $this->student->delete($id);
            if ($response) {
                return $this->respond($student);
            }
            return $this->fail('Sorry! not deleted');
        }
        return $this->failNotFound('Sorry! no student found');
    }
    
}
