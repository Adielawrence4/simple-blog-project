<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    // calling the user model
    private $user;

    // defining the session
    private $session;

    public function __construct()
    {
        helper('form');

        $this->user = new UsersModel();

        $this->session = session();
    }

    public function register()
    {


        $errordata = ['name', 'username'];

        if (isset($_POST['submit'])) {

            // validating the register

            $registrationRules = [

                'name' => 'required',
                'username' => 'required',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]'
            ];





            if ($this->validate($registrationRules)) {

                // this is where we insert our data

                // i create a function for image control

                $image = $this->request->getFile('image');


                function control_image($image)
                {
                    $image_name = $image->getName();

                    $seperatingImageName = explode('.', $image_name);

                    $newName = time() . '-' . 'Avatar' . '-' . rand(1000000, 9999999) . '.' . end($seperatingImageName);

                    if ($image == '') {
                        return 'undraw_profile.svg';
                    } else {

                        $image->move('public/assets/images/user_profile', $newName);

                        return $newName;
                    }
                }

                $data = [
                    'name' => htmlspecialchars($this->request->getPost('name')),
                    'username' => htmlspecialchars($this->request->getPost('username')),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'image' => control_image($image)
                ];

                if ($this->request->getPost('password') == $this->request->getPost('confirmPassword')) {

                    if ($this->user->save($data)) {
                        return redirect()->to(url_to('login'))->with('registrationSuccess', 'You have successfully registered, try and login your account');
                    } else {
                        return redirect()->to(url_to('register'))->with('registrationError', 'Failed to register, try again');
                    }
                }else {
                    
                    return redirect()->to(url_to('register'))->with('passError', 'password does not match,try again');

                }


                // inserting the data to my db

            } else {

                //  To check for duplicate email address

                $validateEmail = $this->user->findAll();

                foreach ($validateEmail as $key) {

                    if ($key['email'] == $this->request->getPost('email')) {

                        $errordata['email_duplication'] = 'The email is already registered, try a different email';

                        return redirect()->to(url_to('register'));
                    }
                }


                // checking if the two password match




                // this is where we catch our error and display them as flashdata

                // $errordata = $this->validator->getErrors();
                $errordata['username'] = $this->validator->getError('username');
                $errordata['name'] = $this->validator->getError('name');
                $errordata['password'] = $this->validator->getError('password');
                $errordata['email'] = $this->validator->getError('email');
            }
        }
        if ($this->session->has('id') == true) {
            return redirect()->to(url_to('403'));
        } else {          
    
            return view('/admin/register', compact('errordata'));
        }
        
    }

    public function login()
    {


        // first validate your login

        $errors = [];

        if (isset($_POST['submit'])) {
            $rules = [
                'email' => 'required|valid_email'
            ];
    
            if ($this->validate($rules)) {
    
                // searching for the email in db
                $email = $this->request->getPost('email');

                // checking if email is in db

                $checkemail = $this->user->findAll();

                foreach ($checkemail as $key) {

                    if ($email !== $key['email']) {
                        $errors['email_val'] = 'Email is not correct'; 
                    }
                }
                
                $validateEmail = $this->user->where('email', $email)->find();
    
                // using the result to verify the password
    
                foreach ($validateEmail as $key) {


                    if (password_verify($this->request->getPost('password'), $key['password'])) {
                        
                        $this->session->set([
                            'username' => $key['username'],
                            'email' => $key['email'],
                            'name' => $key['name'],
                            'id' => $key['id'],
                            'image' => $key['image']
                        ]);
                        
                        return redirect()->to(url_to('dashboard'))->with('loggedIn', 'Your have logged In');
                    } else {
                        
                         
                        
                        return redirect()->to(url_to('login'))->with('verifyError', 'Wrong password, Try again');
                    }
                }
                
            
            } else {
                $errors['email'] = $this->validator->getError('email');
            }
        }



        if ($this->session->has('id') == true) {
            return redirect()->to(url_to('403'));
        } else {          
            return view('/admin/login', compact('errors'));
        }
        
    }

    public function profile() {}

    public function logout() {

        $this->session->destroy();

        return redirect()->to(url_to('login'));
    }



    // the part that controls the admin 

    public function admin_user() {

        $users_info = $this->user->find($this->session->get('id'));

        // to fetch all users
        $all_users = $this->user->findAll();

        
        
        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            return view('/admin/user', compact('users_info', 'all_users'));
        }
    }
}
