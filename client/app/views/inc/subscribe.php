<!-- Start Subscribe Popup Box -->
<div class="echo-popup-model" id="id01">
    <div class="echo-popup-transition">
        <div class="model-content animate-subscribe-popup">
            <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'"><i class="fa-regular fa-xmark"></i></a>
            <div class="echo-p-flexing">
                <div class="echo-p-img">
                    <img src="<?=URLROOT?>/img/site-logo/newsletter.png" alt="Echo">
                </div>
                <div class="form">
                    <div class="echo-p-sub-heading">
                        <p>Weekly Updates</p>
                    </div>
                    <div class="echo-p-sub-heading">
                        <h3>Let's join our newsletter!</h3>
                    </div>
                    <form action="<?=URLROOT?>/subscribe" method="post">
                        <input type="email" name="newsletter" required placeholder="Enter Your Email..">
                        <button type="submit">Submit</button>
                    </form>
                    <div class="echo-bottom-popup">
                        <p>Do not worry we don't spam!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Subscribe Popup Box -->