<?php

class Pages extends Controller {
    public function __construct(){
        $this->pageModel = $this->model('Page');
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');

        // some data that used on all pages
        $this->menu = $this->categoryModel->getCategories();
        $this->recentPosts = $this->postModel->getPostsWithLimit(4,0);
        $this->navTrendingPosts = $this->postModel->getTrendingPostsWithLimit(3,0);
    }

    public function index(){
        $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);

        // content with limit
        $perPagePosts = PAGE_LIMIT;
        $totalPages = $this->pageModel->getPagesRowCount();
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $perPagePosts;
        $pages = $this->pageModel->getPagesWithLimit($perPagePosts, $offset);

        // Pagination
        $lastPage = ceil($totalPages / $perPagePosts);
        $prevPage = $currentPage > 1 ? $currentPage - 1 : $currentPage;
        $prevPage = $currentPage > $lastPage ? $lastPage : $prevPage; // make sure it should be right, even if the current page is not right
        $nextPage = $currentPage * $perPagePosts < $totalPages ? $currentPage + 1 : $currentPage;

        $data = [
            'title' => 'All Pages',
            'description' => 'All informational pages of the website',
            'type' => 'article',
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts,
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
            'topStories' => $topStories ?? [],
            'pages' => $pages,

            // pagination
            'perPagePosts' => $perPagePosts,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'lastPage' => $lastPage,
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'Ecom blog is great!',
            'type' => 'article',
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts,
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
        ];
        $this->view('pages/about', $data);
    }

    public function contact(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'title' => 'Contact Us',
                'description' => 'Ecom blog support is helpful!',
                'type' => 'article',
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'subject' => trim($_POST['subject']),
                'message' => trim($_POST['message']),
            ];

            // send email to the admin mail
            $isSent = sendMail($data['name'], $data['email'], $data['subject'], $data['message']);
            if($isSent){
                $data += ['success' => 'Thank you contacting us, we will reach you soon.'];
            };
            
            $this->view('pages/contact', $data);
        }
        
        else {
            $data = [
                'title' => 'Contact Us',
                'description' => 'Ecom blog support is helpful!',
                'type' => 'article',
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
                'name' => '',
                'email' => '',
                'phone' => '',
                'subject' => '',
                'message' => '',
                'success' => '',
            ];
            $this->view('pages/contact', $data);
        }
    }

    public function notfound(){
        $data = [
            'title' => '404',
            'description' => 'Bad Request, Page Not Found',
            'type' => 'website',
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts,
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
        ];
        $this->view('pages/notfound', $data);
    }

    public function page($slug){
        $page = $this->pageModel->getPageBySlug($slug);
        if($page){
            $data = [
                'title' => $page->title,
                'description' => $page->meta,
                'type' => 'article',
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
                'page' => $page,
            ];
            $this->view('pages/page', $data);
        }else{
            redirect('pages/notfound');
        }
    }
}