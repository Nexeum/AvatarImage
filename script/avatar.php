<?php

function createAvatarImage($string)
{
    $imageFilePath = "avatar/" . $string . ".png";

    if (!file_exists($imageFilePath))
    {
        /*
            Base avatar image that we use to center
            our text string on top of it
        */
        $avatar = imagecreate(185,190);

        /*
            Assign random RGB values
        */

        $r = rand(50,200); /* r (red) */
        $g = rand(50,200); /* g (green) */
        $b = rand(50,200); /* b (blue) */

        imagecolorallocate($avatar, $r, $g, $b);
        $textcolor = imagecolorallocate($avatar, 255, 255, 255);
        $font = 'fonts/bold.ttf';
        $font = mb_convert_encoding($font, 'big5', 'utf-8');

        include "sizeavatar.php";

        imagettftext($avatar, 90, 0, $x, $y, $textcolor, $font, $string);

        /*
            Header("Content-type: image/png");
        */
        imagepng($avatar, $imageFilePath);
        imagedestroy($avatar);
        return $imageFilePath;
    } 
    else 
    {
        $imageFilePath = "avatar/" . $string . ".png";
        return $imageFilePath;
    }
}

?>
