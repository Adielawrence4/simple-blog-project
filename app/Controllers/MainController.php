<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\ContactsModel;
use App\Models\PostModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class MainController extends BaseController
{

    private $user;
    private $comment;
    private $post;
    private $contact;

    private $session;


    public function __construct()
    {

        $this->user = new UsersModel();
        $this->post = new PostModel();
        $this->contact = new ContactsModel();
        $this->comment = new CommentModel();

        $this->session = session();
    }



    public function home()
    {


        // fetching data from db and also linking two tables to get the user info

        $view_posts = $this->post->join('users', 'users.id = posts.user_id')->orderBy('posts.post_id', 'DESC')->limit(10)->findAll();

        $all_posts = $this->post->join('users', 'users.id = posts.user_id')->orderBy('posts.post_id', 'DESC')->findAll();


        return view('/main/index', compact('view_posts', 'all_posts'));
    }

    public function content()
    {

        $all_posts = $this->post->orderBy('id', 'DESC')->findAll();

        return view('/main/index', compact('all_posts'));
    }

    public function about()
    {


        return view('/main/about');
    }

    public function post()
    {

        $latest_post = $this->post->orderBy('post_id', 'DESC')->first();

        // getting the authors informations
        
        $author = $this->user->where('id', $latest_post['user_id'])->first();
        
        // viewing all comment on this post

        $comments = $this->comment->where('post_id', $latest_post['post_id'])->findAll();

        return view('/main/post', compact('latest_post', 'comments', 'author'));
    }
    

    public function view_post($id)
    {
        
        // getting the authors informations
        

        $single_post = $this->post->where('posts.post_id', $id)->join('users', 'users.id = posts.user_id')->first();

        $get_image = $this->post->where('post_id', $id)->first();
        
        

        $comments = $this->comment->where('post_id', $id)->findAll();


        return view('/main/view', compact('id', 'single_post', 'comments', 'get_image'));
    }

    public function contact()
    {
        $error = [];

        if (isset($_POST['submit'])) {

            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'message' => 'required'
            ];

            if ($this->validate($rules)) {

                $data = [
                    'name' => htmlspecialchars($this->request->getPost('name')),
                    'email' => $this->request->getPost('email'),
                    'number' => htmlspecialchars($this->request->getPost('number')),
                    'message' => htmlspecialchars($this->request->getPost('message')),
                ];

                $save_contact = $this->contact->save($data);

                if ($save_contact) {
                    return redirect()->to(url_to('contact'))->with('saveContact', 'Feedback has been heard,In due time you will hear from us');
                } else {
                    # code...
                    return redirect()->to(url_to('contact'))->with('saveError', 'something went wrong');
                }
            } else {

                $error['name'] = $this->validator->getError('name');
                $error['email'] = $this->validator->getError('email');
                $error['message'] = $this->validator->getError('message');
            }
        }

        return view('/main/contact', compact('error'));
    }
}
