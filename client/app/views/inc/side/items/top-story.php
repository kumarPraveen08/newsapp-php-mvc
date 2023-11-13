<div class="echo-home-1-hero-area-top-story">
            <h5 class="text-center">Top Story</h5>
                <?php if($data['topStories']){
                    foreach($data['topStories'] as $post){
                        echo '<div class="echo-top-story">
                                <div class="echo-story-picture img-transition-scale">
                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover"></a>
                                </div>
                                <div class="echo-story-text">
                                    <h6><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h6>
                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                </div>
                            </div>';
                    }
                }else{
                    echo '<li>No post found!</li>';
                } ?>
        </div>