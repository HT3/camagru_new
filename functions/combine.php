<?php
    include 'insert.php';
    function ImgToStr($image) {
        ob_start();
        imagepng($image);
        $image_data = ob_get_contents();
        ob_end_clean();
        return "data:image/$format;base64,".base64_encode($image_data);
    }
    function str_to_png($base64_str, $output) {
        $ifp = fopen($output, "wb");
        fwrite($ifp, base64_decode($base64_str));
        fclose($ifp);
        return($output);
    }
    session_start();
    str_to_png(str_replace('data:image/png:base64,', '',$_POST['image_1']), 'tmp.png');
    $image2 = imagecreatefrompng($_POST['image_2']);
    $image1 = imagecreatefrompng('tmp.png');
    $user = htmlspecialchars($_SESSION['username']);
    imagealphablending($image1, false);
    imagesavealpha($image1, true);
    imagecopymerge($image1, $image2, 0, 0, 0, 0, 150, 150, 100);
    $new_image = ImgToStr($image1, 'png');
    if (strlen($new_img) > 5000) {
        insert_image($user, $new_img);
    }
    else
        echo '<script>alert("An Error As Occurred Attempting To Submit Your Picture");history.back();</script>';
?>