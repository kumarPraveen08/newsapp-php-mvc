<?php 

/**
 * TO DO:
 * 
 * Category rss
 * Author rss
 * All posts rss
 * Tags/Search rss
 */

class Rss extends Controller {
    public function __construct(){
        $this->postModel = $this->model('Post');
    }

    public function index() {
        header('Content-Type: text/xml');
        $posts = $this->postModel->getPostsWithLimit(10,0);
        
        $feed = '<?xml version="1.0" encoding="UTF-8"?>
                <rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                    <channel>
                        <title>'.SITENAME.'</title>
                        <description>'.SITE_DESCRIPTION.'</description>
                        <link>'.URLROOT.'</link>
                        <copyright>Copyright (C) 2023 '.SITENAME.'</copyright>
                        <language>en</language>
                        <docs>'.URLROOT.'</docs>';

        // feed items
       foreach($posts as $post){
            $feed .= '<item>
                <title>'.$post->title.'</title>
                <description>'.$post->body.'</description>
                <link>'.URLROOT.'/posts/post/'.$post->postId.'</link>
                <guid isPermaLink="true">'.URLROOT.'/posts/post/'.$post->postId.'</guid>
                <pubDate>'.$post->postCreated.'</pubDate>
                <category domain="'.URLROOT.'/archives/category/'.$post->categoryId.'">'.$post->name.'</category>
                <dc:creator>'.$post->username.'</dc:creator>
                <media:content url="'.URLROOT.'/img/posts/'.$post->thumbnail.'" type="image/jpeg" expression="full" width="538" height="190"> </media:content>
                <category>'.$post->name.'</category>
            </item>';
        }
                        
        $feed .= '</channel>
            </rss>';

        $data = [
            'title' => 'Rss Feeds',
            'feeds' => $feed
        ];

        $this->view('rss/index', $data);
    }

    public function category($id) {
        header('Content-Type: text/xml');
        $posts = $this->postModel->getPostsByCateId($id, 10);
        
        $feed = '<?xml version="1.0" encoding="UTF-8"?>
                <rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                    <channel>
                        <atom:link href="'.URLROOT.'/rss/category/'.$id.'" rel="self" type="application/rss+xml"/>
                        <title>'.SITENAME.'</title>
                        <description>'.SITE_DESCRIPTION.'</description>
                        <link>'.URLROOT.'/archives/category/'.$id.'</link>
                        <copyright>Copyright (C) 2023 '.SITENAME.'</copyright>
                        <language>en</language>
                        <docs>'.URLROOT.'</docs>';

        // feed items
       foreach($posts as $post){
            $feed .= '<item>
                <title>'.$post->title.'</title>
                <description>'.$post->body.'</description>
                <link>'.URLROOT.'/posts/post/'.$post->postId.'</link>
                <guid isPermaLink="true">'.URLROOT.'/posts/post/'.$post->postId.'</guid>
                <pubDate>'.$post->postCreated.'</pubDate>
                <category domain="'.URLROOT.'/category/'.$post->categoryId.'">'.$post->name.'</category>
                <dc:creator>'.$post->username.'</dc:creator>
                <media:content url="'.URLROOT.'/img/posts/'.$post->thumbnail.'" type="image/jpeg" expression="full" width="538" height="190"> </media:content>
                <category>'.$post->name.'</category>
            </item>';
        }
                        
        $feed .= '</channel>
            </rss>';

        $data = [
            'title' => 'Rss Feeds',
            'feeds' => $feed
        ];

        $this->view('rss/index', $data);
    }
}