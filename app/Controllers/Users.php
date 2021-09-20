<?php

namespace App\Controllers;

use App\Models\Users as UserDB;
use CodeIgniter\Controller;

class Users extends Controller
{

    public function index()
    {
        echo view('users/index');
    }

    public function login()
    {
        helper(['form']);
        return view('/users/login');
    }

    public function register()
    {
        helper(['form']);
        return view('/users/signup');
    }

    public function create()
    {
        $model = new UserDB();
        if ($this->request->getMethod() === 'post') {
            $rules =
                [
                    'firstname' => 'required|min_length[2]|max_length[25]',
                    'lastname' => 'required|min_length[3]|max_length[25]',
                    'email' => 'required|min_length[6]|max_length[25]|valid_email|is_unique[users.email]',
                    'password' => 'required|min_length[8]',
                    'password_confirm' => 'matches[password]'
                ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                helper(['form']);
                echo view('users/signup', $data);
            } else {
                $model->save([
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password')
                ]);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration...');
                return redirect()->to('/login');
            }
        }

    }

    public function profile()
    {
        if(!session()->get('isLoggedIn')){
            return redirect('login');
        }
        return view('/users/index');
    }

    public function signin()
    {
        $session = session();
        $model = new UserDB();
        if ($this->request->getMethod() === 'post') {
            $rules =
                [
                    'email' => 'required',
                    'password' => 'required',
                ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                helper(['form']);
                echo view('users/login', $data);
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $data = $model->where('email', $email)->first();
                if ($data) {
                    $pass = $data['password'];
                    $authPassword = password_verify($password, $pass);
                    if ($authPassword) {
                        $session_data = [
                            'id' => $data['id'],
                            'fname' => $data['firstname'],
                            'lname' => $data['lastname'],
                            'email' => $data['email'],
                            'isLoggedIn' => TRUE,
                        ];
                        $session->set($session_data);
                        return redirect('/');
                    } else {
                        $session->setFlashdata('msg', 'password Or Email Incorrect');
                        return redirect('login');
                    }
                } else {
                    $session->setFlashdata('msg', 'password Or Email Incorrect');
                    return redirect('/login');

                }
            }

        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect('/');
    }
}
