<?php

namespace App\Controllers;

use App\Models\CommentModel;
use App\Models\ContactsModel;
use App\Models\PostModel;
use App\Models\UsersModel;

class Home extends BaseController
{

    private $user;
    private $session;
    private $comment;
    private $post;
    private $contact;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->session = session();


        $this->comment = new CommentModel();

        $this->post = new PostModel();

        $this->contact = new ContactsModel();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard() 
    {

        // counting each column and display the total

        $total_comment = $this->comment->findAll();

        $total_user = $this->user->findAll();

        $total_post = $this->post->findAll();

        $total_contact = $this->contact->findAll();

        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            return view('admin/dashboard', compact('total_comment', 'total_user', 'total_post', 'total_contact'));
        }
        
    }


    public function error_404()  {
        
        return view('/errors/error_404');
    }

    public function error_403()  {
        
        return view('/errors/error_403');
    }

}
