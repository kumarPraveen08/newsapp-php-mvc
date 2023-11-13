<?php

class Posts extends Controller {
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');
        $this->commentModel = $this->model('Comment');

        // some data that used on all pages
        $this->menu = $this->categoryModel->getCategories();
        $this->recentPosts = $this->postModel->getPostsWithLimit(4,0);
        $this->navTrendingPosts = $this->postModel->getTrendingPostsWithLimit(3,0);
    }

    public function index(){
        $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);
        
        // content with limit
        $perPagePosts = POST_LIMIT;
        $totalPosts = $this->postModel->getPostsRowCount();
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($currentPage - 1) * $perPagePosts;
        $posts = $this->postModel->getPostsWithLimit($perPagePosts, $offset);
        
        // Pagination
        $lastPage = ceil($totalPosts / $perPagePosts);
        $prevPage = $currentPage > 1 ? $currentPage - 1 : $currentPage;
        $prevPage = $currentPage > $lastPage ? $lastPage : $prevPage; // make sure it should be right, even if the current page is not right
        $nextPage = $currentPage * $perPagePosts < $totalPosts ? $currentPage + 1 : $currentPage;

        $data = [
            // meta details
            'title' => 'All Posts',
            'description' => 'this is homepage of the website',
            'type' => 'article',

            // all pages component data
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts,
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
            'topStories' => $topStories ?? [],

            // main content
            'posts' => $posts,

            // pagination
            'perPagePosts' => $perPagePosts,
            'totalPosts' => $totalPosts,
            'currentPage' => $currentPage,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'lastPage' => $lastPage,
        ];
        $this->view('posts/index', $data);
    }

    public function post($slug){
        $post = $this->postModel->getPostBySlug($slug);
        $user = isset($_SESSION['user_id']) ? $this->userModel->getUser($_SESSION['user_id']) : false;
        
        if($post){
            $author = $this->userModel->getUser($post->user_id);
            $category = $this->categoryModel->getCategory($post->category_id);
            $topStories = $this->postModel->getTrendingPostsWithLimit(5,0);
            $comments = $this->commentModel->getCommentsByPostId($post->id);
            $commentsCount = count($comments);
            $relatedPosts = $this->postModel->relatedPostsByCateId($post->category_id, $post->id);

            // increment view of the current post
            $this->postModel->incrementPostView($post->id, $post->views);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => $post->title,
                    'description' => $post->meta,
                    'type' => 'article',
                    'menu' => $this->menu,
                    'recentPosts' => $this->recentPosts,
                    'navTrendingPosts' => $this->navTrendingPosts ?? [],
                    'topStories' => $topStories ?? [],
                    'relatedPosts' => $relatedPosts ?? [],
                    'post' => $post,
                    'author' => $author,
                    'category' => $category,
                    'reading' => readingTime(strlen($post->body)),
                    'user' => $user,
                    'user_id' => $_SESSION['user_id'] ?? '',
                    'post_id' => $post->id,
                    'comment' => trim($_POST['message']),
                    'comments' => $comments,
                    'commentsCount' => $commentsCount,
                ];

                // add comment in the table
                if($this->commentModel->addComment($data)){
                    redirect('posts/post/'.$slug);
                    $this->view('posts/post', $data);
                }else{
                    die('Something went wrong');
                }
            }else{
                $data = [
                    'title' => $post->title,
                    'description' => $post->meta,
                    'type' => 'article',
                    'menu' => $this->menu,
                    'recentPosts' => $this->recentPosts,
                    'navTrendingPosts' => $this->navTrendingPosts ?? [],
                    'topStories' => $topStories ?? [],
                    'relatedPosts' => $relatedPosts ?? [],
                    'post' => $post,
                    'author' => $author,
                    'category' => $category,
                    'reading' => readingTime(strlen($post->body)),
                    'user' => $user,
                    'user_id' => 2,
                    'post_id' => $post->id,
                    'comment' => '',
                    'comments' => $comments,
                    'commentsCount' => $commentsCount,
                ];
                $this->view('posts/post', $data);
            }
        }else{
            redirect('pages/notfound');
        }
    }
}