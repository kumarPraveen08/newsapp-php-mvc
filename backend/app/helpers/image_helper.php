<?php
function uploadImage($image, $validSize=MAX_IMAGE_SIZE_SUPPORT, $directory){

    if($image) {
        $name = $image['name'];
        $type = $image['type'];
        $size = $image['size'];
        $tmp = $image['tmp_name'];
        
        if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg'){

            // Check for valid image size
            if($size <= $validSize){

                // Image extension
                $ext = explode('.', $name)[1];

                // Rename image
                $name = 'default_'.bin2hex(random_bytes(8)).'_'.$size.'.'.$ext;

                // move image to directory
                move_uploaded_file($tmp, $directory . $name);

                return $name;

            } else {
                return false;
            }

        } else {
            return false;
        }
    } 
}