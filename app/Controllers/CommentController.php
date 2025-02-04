<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentController extends BaseController
{

    private $user;
    private $session;
    private $comment;

    public function __construct()
    {

        $this->comment = new CommentModel();
        $this->user = new UsersModel();
        $this->session = session();
    }

    public function add()
    {
        $error = [];

        $rules = [
            'post_id' => 'required',
            'comment' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'post_id' => $this->request->getPost('post_id'),
                'comment' => $this->request->getPost('comment'),
                'user_id' => $this->session->get('id')
            ];

            $save = $this->comment->save($data);

            if ($save) {
                return redirect()->to(url_to('post'));
            } else {
                return redirect()->to(url_to('index'));
            }
        } else {
            $error['comment'] = $this->validator->getError('comment');
        }


        return view('/main/post', compact('error'));
    }

    public function addCommentInView($id) {
        $error = [];

        $rules = [
            'post_id' => 'required',
            'comment' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'post_id' => $this->request->getPost('post_id'),
                'comment' => $this->request->getPost('comment'),
                'user_id' => $this->session->get('id')
            ];

            $save = $this->comment->save($data);

            if ($save) {
                return redirect()->to(url_to('view', $id));
            } 
        } else {
            $error['comment'] = $this->validator->getError('comment');
        }


        return view('/main/view', compact('error', 'id'));
    }

    public function view_comment()
    {

        $users_info = $this->user->find($this->session->get('id'));

        // fetching all comments from db
        $all_comments = $this->comment->findAll();


        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/comment', compact('users_info', 'all_comments'));
        }

    }
}
