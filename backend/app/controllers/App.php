<?php

class App extends Controller {
    public function __construct(){
        isLoggedIn();
        $this->postModel = $this->model('Post');
        $this->pageModel = $this->model('Page');
        $this->userModel = $this->model('User');
        $this->commentModel = $this->model('Comment');
        $this->user = userDetails();
    }

    public function index(){
        $postRowCount = $this->postModel->getPostsRowCount();
        $pageRowCount = $this->pageModel->getPagesRowCount();
        $userRowCount = $this->userModel->getUsersRowCount();
        $commentRowCount = $this->commentModel->getCommentsRowCount();
        $results = [
            (object) ['name' => 'Total Posts', 'count' => $postRowCount, 'path' => '/posts', 'bg' => 'info'],
            (object) ['name' => 'Total Users', 'count' => $userRowCount, 'path' => '/users', 'bg' => 'success'],
            (object) ['name' => 'Total Pages', 'count' => $pageRowCount, 'path' => '/pages', 'bg' => 'warning'],
            (object) ['name' => 'Total Comments', 'count' => $commentRowCount, 'path' => '/comments', 'bg' => 'danger'],
        ];

        $data = [
            'title' => 'All Pages',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'dashboard' => $results,
        ];

        $this->view('index', $data);
    }
}