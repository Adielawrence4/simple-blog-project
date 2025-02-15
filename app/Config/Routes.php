<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Routes for main pages
// for home page
$routes->get('/', 'mainController::home', ['as' => 'index']);
$routes->get('/content', 'mainController::content', ['as' => 'content']);


// for about page

$routes->get('/about', 'mainController::about', ['as' => 'about']);


// for post page 

$routes->get('/post', 'mainController::post', ['as' => 'post']);

$routes->get('/view/(:num)', 'mainController::view_post/$1', ['as' => 'view']);


// for contact page

$routes->get('/contact', 'mainController::contact', ['as' => 'contact']);
$routes->post('/contact', 'mainController::contact');


$routes->post('/delete_contact/(:num)', 'contactsController::delete/$1', ['as' => 'delete_contact']);




// Routes for user action
//  user login

$routes->get('/login', 'UserController::login', ['as' => 'login']);
$routes->post('/login', 'UserController::login');


//  user registration

$routes->get('/register', 'UserController::register', ['as' => 'register']);
$routes->post('/register', 'UserController::register');


// Profile

$routes->get('/profile', 'UserController::profile', ['as' => 'profile']);
$routes->get('/edit-profile', 'UserController::edit_profile', ['as' => 'edit-profile']);
$routes->post('/edit-profile', 'UserController::edit_profile', ['as' => 'edit-profile']);


//  log out

$routes->get('/logout', 'UserController::logout', ['as' => 'logout']);



// Routes for post action
// creating post

$routes->get('/create_post', 'postController::create', ['as' => 'create_post']);
$routes->post('/create_post', 'postController::create');

// listing post

$routes->get('/admin/post', 'postController::list_post', ['as' => 'admin.post']);

// Viewing post

$routes->get('/view_post', 'postController::view_post', ['as' => 'view_post']);

// Edit post

$routes->get('/edit_post/(:num)', 'postController::update/$1', ['as' => 'edit_post']);
$routes->post('/edit_post/(:num)', 'postController::update/$1');

// Delete post

$routes->post('/delete_post/(:num)', 'postController::delete/$1', ['as' => 'delete_post']);



// Routes for comment action
// Adding comment

$routes->get('/admin/comment', 'commentController::view_comment', ['as' => 'admin.comment']);

$routes->post('add_comment', 'commentController::add', ['as' => 'add_comment']);
$routes->post('add_view_comment/(:num)', 'commentController::addCommentInView/$1', ['as' => 'add_view_comment']);
$routes->post('delete_comment/(:num)', 'commentController::delete_comment/$1', ['as' => 'delete_comment']);




// admin Dashboard

$routes->get('/dashboard', 'Home::dashboard', ['as' => 'dashboard']);

$routes->get('/admin/user', 'userController::admin_user', ['as' => 'admin.user'] );

$routes->get('/admin/contact', 'contactsController::admin_contact', ['as' => 'admin.contact'] );




// routes for Error message

$routes->get('/404', 'Home::error_404', ['as' => '404']);
$routes->get('/403', 'Home::error_403', ['as' => '403']);