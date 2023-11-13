<?php

class Main extends Controller {
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->newsletterModel = $this->model('Newsletter');

        // some data that used on all pages
        $this->menu = $this->categoryModel->getCategories();
        $this->recentPosts = $this->postModel->getPostsWithLimit(4,0);
        $this->navTrendingPosts = $this->postModel->getTrendingPostsWithLimit(3,0);
    }

    public function index(){
        $featuredPosts = $this->postModel->getFeaturedPostsWithLimit(3, 0);
        $fashionPosts = $this->postModel->getPostsByCateId(FIRST_COL_CATE_ID, 3);
        $technologyPosts = $this->postModel->getPostsByCateId(SECOND_COL_CATE_ID, 3);
        $travelPosts = $this->postModel->getPostsByCateId(THIRD_COL_CATE_ID, 3);
        $featuredVideoPost = $this->postModel->getFeaturedVideoPosts(true, 1);
        $recentVideoPosts = $this->postModel->getVideoPostsWithLimit(3, 0);
        $trendingPosts = $this->postModel->getTrendingPostsWithLimit(4, 0);
        $featuredTrendingPosts = $this->postModel->getFeaturedTrendingPostsWithLimit(2, 0);
        $archivePosts = $this->postModel->getOldestPostsWithLimit(4, 0);
        $archiveFeaturedPosts = $this->postModel->getOldestFeaturedPostsWithLimit(3, 0);
        $newFeaturedPosts = $this->postModel->getFeaturedPostsWithLimit(2, 0);
        
        $data = [
            'title' => 'Home Page',
            'description' => 'this is homepage of the website',
            'type' => 'wesbite',
            'menu' => $this->menu,
            'recentPosts' => $this->recentPosts ?? [],
            'navTrendingPosts' => $this->navTrendingPosts ?? [],
            'featuredPosts' => $featuredPosts ?? [],
            'fashionPosts' => $fashionPosts ?? [],
            'technologyPosts' => $technologyPosts ?? [],
            'travelPosts' => $travelPosts ?? [],
            'featuredVideoPost' => $featuredVideoPost[0] ?? '',
            'recentVideoPosts' => $recentVideoPosts ?? [],
            'trendingPosts' => $trendingPosts ?? [],
            'featuredTrendingPosts' => $featuredTrendingPosts ?? [],
            'archivePosts' => $archivePosts ?? [],
            'archiveFeaturedPosts' => $archiveFeaturedPosts ?? [],
            'newFeaturedPosts' => $newFeaturedPosts ?? [],
        ];
        $this->view('index', $data);
    }

    public function subscribe(){
        print_r($_POST);
    }
}