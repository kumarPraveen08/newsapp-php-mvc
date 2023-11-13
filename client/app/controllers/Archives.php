<?php

class Archives extends Controller {
    public function __construct(){
        $this->categoryModel = $this->model('Category');
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');

        // some data that used on all pages
        $this->menu = $this->categoryModel->getCategories();
        $this->recentPosts = $this->postModel->getPostsWithLimit(4,0);
        $this->navTrendingPosts = $this->postModel->getTrendingPostsWithLimit(3,0);
    }

    public function index(){
        redirect('posts/index');
    }

    public function author($id){
        $author = $this->userModel->getUser($id);
        $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);

        if($author){

            // content with limit
            $perPagePosts = ARCHIVE_LIMIT;
            $totalPosts = count($this->postModel->getPostsByUserId($author->id));
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $perPagePosts;
            $posts = $this->postModel->getPostsByUserIdWithLimit($author->id, $perPagePosts, $offset);

            // Pagination
            $lastPage = ceil($totalPosts / $perPagePosts);
            $prevPage = $currentPage > 1 ? $currentPage - 1 : $currentPage;
            $prevPage = $currentPage > $lastPage ? $lastPage : $prevPage; // make sure it should be right, even if the current page is not right
            $nextPage = $currentPage * $perPagePosts < $totalPosts ? $currentPage + 1 : $currentPage;

            $data = [
                'title' => 'Author: '.$author->username.'',
                'description' => $author->bio,
                'type' => 'article',
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
                'topStories' => $topStories ?? [],
                'author' => $author,
                'posts' => $posts,

                // pagination
                'perPagePosts' => $perPagePosts,
                'totalPosts' => $totalPosts,
                'currentPage' => $currentPage,
                'prevPage' => $prevPage,
                'nextPage' => $nextPage,
                'lastPage' => $lastPage,
            ];
            $this->view('archives/author', $data);
        }else{
            redirect('pages/notfound');
        }
        
    }

    public function category($slug){
        $category = $this->categoryModel->getCategoryBySlug($slug);
        $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);
        
        if($category){
            
            // content with limit
            $perPagePosts = ARCHIVE_LIMIT;
            $totalPosts = count($this->postModel->getPostsByCateId($category->id));
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $perPagePosts;
            $posts = $this->postModel->getPostsByCateIdWithLimit($category->id, $perPagePosts, $offset);

            // Pagination
            $lastPage = ceil($totalPosts / $perPagePosts);
            $prevPage = $currentPage > 1 ? $currentPage - 1 : $currentPage;
            $prevPage = $currentPage > $lastPage ? $lastPage : $prevPage; // make sure it should be right, even if the current page is not right
            $nextPage = $currentPage * $perPagePosts < $totalPosts ? $currentPage + 1 : $currentPage;

            $data = [
                'title' => $category->name,
                'description' => $category->about_cate,
                'type' => 'article',
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
                'topStories' => $topStories ?? [],
                'posts' => $posts,
                'category' => $category,

                // pagination
                'perPagePosts' => $perPagePosts,
                'totalPosts' => $totalPosts,
                'currentPage' => $currentPage,
                'prevPage' => $prevPage,
                'nextPage' => $nextPage,
                'lastPage' => $lastPage,
            ];
            $this->view('archives/category', $data);
        }else{
            redirect('pages/notfound');
        }
        
    }

    public function search(){
        $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);
        $keyword = trim($_GET['s']);

        if(strlen($keyword) >= 3){
            $posts = $this->postModel->getMatchedPosts('%'.$keyword.'%');

            // content with limit
            $perPagePosts = ARCHIVE_LIMIT;
            $totalPosts = count($this->postModel->getMatchedPosts('%'.$keyword.'%'));
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $perPagePosts;
            $posts = $this->postModel->getMatchedPostsWithLimit('%'.$keyword.'%', $perPagePosts, $offset);

            // Pagination
            $lastPage = ceil($totalPosts / $perPagePosts);
            $prevPage = $currentPage > 1 ? $currentPage - 1 : $currentPage;
            $prevPage = $currentPage > $lastPage ? $lastPage : $prevPage; // make sure it should be right, even if the current page is not right
            $nextPage = $currentPage * $perPagePosts < $totalPosts ? $currentPage + 1 : $currentPage;
        }
        
        $data = [
            'title' => $keyword,
            'description' => 'this is about page of the website',
            'type' => 'article',
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts,
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
            'topStories' => $topStories ?? [],
            'posts' => $posts ?? [],
            'keyword' => $keyword ?? '',

            // pagination
            'perPagePosts' => $perPagePosts ?? '',
            'totalPosts' => $totalPosts ?? '',
            'currentPage' => $currentPage ?? '',
            'prevPage' => $prevPage ?? '',
            'nextPage' => $nextPage ?? '',
            'lastPage' => $lastPage ?? '',
        ];
        $this->view('archives/search', $data);
    }

    
}