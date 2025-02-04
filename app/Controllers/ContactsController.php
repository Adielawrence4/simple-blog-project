<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactsModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class ContactsController extends BaseController
{
    private $user;
    private $session;

    private $contact;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->session = session();

        $this->contact = new ContactsModel();
    }

    public function admin_contact()  {



        // fetching all contacts from db

        $all_contacts = $this->contact->findAll();
        


        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/contact', compact('all_contacts'));
        }
    }
    
    
    public function delete($id)  {
        

        $delete = $this->contact->where('id', $id)->delete();

        if ($delete) {
            return redirect()->to(url_to('admin.contact'))->with('contactDelete', "contacts number ". $id ." have been deleted");
        } else {
            return redirect()->to(url_to('admin.contact'))->with('contactDeleteError', "something went wrong while deleting contact number ". $id ."");
            
        }
        

        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/contact', compact('id'));
        
        }
    }
}
