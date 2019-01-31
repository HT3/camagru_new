<?php
    include 'insert.php';
    function base64_to_png($base64_string, $output) {
        $ifp = fopen($output, "wb");
        fwrite($ifp, base64_decode($base64_string));
        fclose($ifp);
        return($output);
    }
    function gdImgToHTML($image) {
        ob_start();
        image;
    }
?>
