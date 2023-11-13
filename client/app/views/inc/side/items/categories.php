<div class="echo-popular-hl-img">
            <div class="echo-home-2-title">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="echo-home-2-main-title">
                            <h5 class="text-capitalize text-center">Popular Categories</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="echo-popular-item">
                <ul class="list-unstyled">
                    <?php if($data['menu']){
                        foreach($data['menu'] as $item){
                            echo '<li><a href="'.URLROOT.'/archives/category/'.$item->slug.'">
                                    <h5>'.$item->name.'</h5>
                                </a></li>';
                        }
                    }else{
                        echo '<li>No category found!</li>';
                    } ?>
                </ul>
            </div>
        </div>