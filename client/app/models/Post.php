<?php

class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get posts by post type
    public function getPostsRowCount(){
        $this->db->query('SELECT * FROM posts');
        return $this->db->rowCount();
    }

    // Get all posts
    public function getPosts(){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.created_at DESC');
        return $this->db->resultSet();
    }

    // Get posts with limit
    public function getPostsWithLimit($limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.created_at DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get old posts first
    public function getOldestPostsWithLimit($limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.created_at ASC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get old featured posts first
    public function getOldestFeaturedPostsWithLimit($limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE featured = :featured
                        ORDER BY posts.created_at ASC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':featured', true);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get featured posts with limit
    public function getFeaturedPostsWithLimit($limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE featured = :featured
                        ORDER BY posts.created_at DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':featured', true);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get posts by category Id
    public function getPostsByCateId($cateId, $limit=10){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.category_id = :category_id
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET 0');
        $this->db->bind(':category_id', $cateId);
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Get posts by category Id with limit and offset
    public function getPostsByCateIdWithLimit($cateId, $limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.category_id = :category_id
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':category_id', $cateId);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get featured video post with limit
    public function getFeaturedVideoPosts($is_video=true, $limit=1){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.is_video = :is_video
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET 0');
        $this->db->bind(':is_video', $is_video);
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Get video posts with limit
    public function getVideoPostsWithLimit($limit=3, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.is_video = :is_video
                        ORDER BY posts.created_at DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':is_video', true);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get trending post with limit by views
    public function getTrendingPostsWithLimit($limit=3, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.views DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get featured trending post with limit by views
    public function getFeaturedTrendingPostsWithLimit($limit=3, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE featured = :featured
                        ORDER BY posts.views DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':featured', true);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get posts by user Id
    public function getPostsByUserId($userId, $limit=10){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.user_id = :user_id
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET 0');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Get posts by user Id with limit and offset
    public function getPostsByUserIdWithLimit($userId, $limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.user_id = :user_id
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get posts by post type
    public function getPostsByType($type, $limit){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE posts.type = :type
                        ORDER BY posts.created_at DESC 
                        LIMIT :limit OFFSET 0');
        $this->db->bind(':type', $type);
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }

    // Get trending posts first
    public function getTreningPosts($limit, $offset){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.views DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get single post by id
    public function getPost($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get single post by slug
    public function getPostBySlug($slug){
        $this->db->query('SELECT * FROM posts WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // search matched post by keyword
    public function getMatchedPosts($keyword){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE title LIKE :title OR body LIKE :body OR categories.name LIKE :name
                        ORDER BY posts.views DESC');
        $this->db->bind(':title', $keyword);
        $this->db->bind(':body', $keyword);
        $this->db->bind(':name', $keyword);
        return $this->db->resultSet();
    }

    // search matched post by keyword with limit and offset
    public function getMatchedPostsWithLimit($keyword, $limit=10, $offset=0){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.slug AS postSlug, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.slug AS categorySlug,
                        categories.created_at AS categoryCreated
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        WHERE title LIKE :title OR body LIKE :body OR categories.name LIKE :name
                        ORDER BY posts.views DESC 
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':title', $keyword);
        $this->db->bind(':body', $keyword);
        $this->db->bind(':name', $keyword);
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
        return $this->db->resultSet();
    }

    // Get related post from category
    public function relatedPostsByCateId($category_id, $current_post_id){
        $this->db->query('SELECT * FROM posts 
                        WHERE category_id = :category_id
                        AND id != :current_post_id
                        ORDER BY posts.id DESC LIMIT 2');
        $this->db->bind(':current_post_id', $current_post_id);
        $this->db->bind(':category_id', $category_id);
        return $this->db->resultSet();
    }

    // Add new post
    public function addPost($data){
        $this->db->query('INSERT INTO posts(title, body, thumbnail, user_id, category_id, tags, meta) VALUES(:title, :body, :thumbnail, :user_id, :category_id, :tags, :meta)');

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':tags', $data['tags']);
        $this->db->bind(':meta', $data['meta']);

        $this->db->execute();
    }

    // Update post by ID
    public function updatePost($data){
        $this->db->query('UPDATE posts SET title = :title, body = :body, thumbnail = :thumbnail, user_id = :user_id, category_id = :category_id, tags = :tags, meta = :meta WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':tags', $data['tags']);
        $this->db->bind(':meta', $data['meta']);

        $this->db->execute();
    }

    // Increment post view by one while loading the article
    public function incrementPostView($post_id, $current_views){
        $this->db->query('UPDATE posts SET views = :views WHERE id = :id');

        $this->db->bind(':id', $post_id);
        $this->db->bind(':views', $current_views + 1);

        $this->db->execute();
    }


    // Update post view
    public function udpatePostView(){
        $this->db->query('UPDATE posts SET views = :views WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':views', $data['views'] + 1);

        $this->db->execute();
    }

    // Delete post by ID
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}