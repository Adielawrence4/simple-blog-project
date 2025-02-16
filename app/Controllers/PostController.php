<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    private $user;
    private $session;
    private $post;
    private $comment;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->session = session();

        $this->post = new PostModel();

        $this->comment = new CommentModel();
    }

    public function create()
    {


        // validating the create post

        $errors = [];

        if (isset($_POST['submit'])) {

            $rules = [
                'title' => 'required',
                'content' => 'required'
            ];

            if ($this->validate($rules)) {

                // inserting into our db but first i need to take care of the image 

                $image_file = $this->request->getFile('image');




                function image_control($image_file)
                {
                    if ($image_file == '') {

                        return '';
                    } else {

                        $fileName = $image_file->getName();

                        $fileNamechange = explode('.', $fileName);

                        $newFileName = random_int(1000000, 9999999) . 'post' . time() . '.' . end($fileNamechange);

                        $image_file->move('public/assets/images/post', $newFileName);

                        return $newFileName;
                    }
                }


                $data = [
                    'title' => htmlspecialchars($this->request->getPost('title')),
                    'content' => htmlspecialchars($this->request->getPost('content')),
                    'image' => image_control($image_file),
                    'user_id' => $this->session->get('id')
                ];

                if ($this->post->save($data)) {
                    return redirect()->to(url_to('admin.post'))->with('postSuccess', 'Post have been add successfully');
                } else {
                    return redirect()->to(url_to('create_post'))->with('postError', 'Something went wrong, Try again');
                }
            } else {
                $errors['title'] = $this->validator->getError('title');
                $errors['content'] = $this->validator->getError('content');
            }
        }


        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/add-post', compact('errors'));
        }

    }

    public function list_post()
    {


        // fetching all post from db

        $all_posts = $this->post->findAll();

        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            return view('admin/post', compact('all_posts'));
            
        }

    }


    public function update($id)
    {



        $post = $this->post->find($id);
        // validating the create post

        $errors = [];

        if (isset($_POST['submit'])) {

            $rules = [
                'title' => 'required',
                'content' => 'required'
            ];

            if ($this->validate($rules)) {


                // inserting into our db but first i need to take care of the image 

                $image_file = $this->request->getFile('image');

                $folder = "./././public/assets/images/post/";
                $delete_image = $this->request->getPost('delete_image');


                function image_control($image_file, $folder, $delete_image)
                {
                    if ($image_file == '') {

                        return $delete_image;
                    } else {


                        
                        
                        $fileName = $image_file->getName();
                        
                        $fileNamechange = explode('.', $fileName);
                        
                        $newFileName = random_int(1000000, 9999999) . '-' .  'post' . '-' . time() . '.' . end($fileNamechange);
                        
                        $image_file->move('public/assets/images/post', $newFileName);
                        
                        
                        
                        
                        if (file_exists(!$folder . $delete_image) == true) {

                            unlink($folder . $delete_image);
                        }else {

                            return $newFileName;
                        };
                        
                    }
                }

                $data = [
                    'title' => htmlspecialchars($this->request->getPost('title')),
                    'content' => htmlspecialchars($this->request->getPost('content')),
                    'image' => image_control($image_file, $folder, $delete_image),
                    'user_id' => $this->session->get('id')
                ];

                $updated_data = $this->post->where('post_id', $id)->set($data)->update();

                if ($updated_data) {
                    return redirect()->to(url_to('admin.post'))->with('postSuccess', 'Post have been add successfully');
                } else {
                    return redirect()->to(url_to('create_post'))->with('postError', 'Something went wrong, Try again');
                }
            } else {
                $errors['title'] = $this->validator->getError('title');
                $errors['content'] = $this->validator->getError('content');
            }
        }



        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/edit-post', compact('id', 'post', 'errors'));
        }
    }

    public function delete($id) {

        $delete = $this->post->find($id);


        $folder = "./././public/assets/images/post/";


        if (isset($_POST['delete'])) {

            if (!file_exists($folder . $delete['image'])) {
            
                unlink($folder . $delete['image']);
            }

            // deleting all the comment linked to the post

            $this->comment->where('post_id', $id)->delete();


            $delete_data = $this->post->where('post_id', $id)->delete();
    
            if ($delete_data) {
                return redirect()->to(url_to('admin.post'))->with('deleteMessage', "post number ". $id ." has been deleted successfully");
            } else {
                return redirect()->to(url_to('admin.post'))->with('deleteError', "post number ". $id ."did not delete.");
            }
        }
        


        if ($this->session->has('id') == false) {
            return redirect()->to(url_to('404'));
        } else {          
            
            return view('/admin/post', compact('id'));
        }
    }
}
