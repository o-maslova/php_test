<?php
    if (!isset($_GET['width']) || !isset($_GET['heigth']) ||
        !isset($_GET['radius']) || !isset($_GET['circle_amount'])) {
            header("Location: index.html");
        }
    
    $width = (int)$_GET['width'];
    $heigth = (int)$_GET['heigth'];
    $radius = (int)$_GET['radius'];
    $circle_num = (int)$_GET['circle_amount'];

    if ($width > 3600 || $heigth > 2400 ||
        $width <= 0 || $heigth <= 0 || $radius <= 0) {
            header("Location: index.html");
        }

    srand(mktime());

    function define_center_x($width, $radius) {
            do {
                $cx = rand(0, $width);
            } while ($cx - $radius < 0 || $cx + $radius > $width);
            return $cx;
        }

    function define_center_y($heigth, $radius) {
            do {
                $cy = rand(0, $heigth);
            } while ($cy - $radius < 0 || $cy + $radius > $heigth);
            return $cy;
        }

    //creation of empty image
    $image = imagecreate($width, $heigth);
    
    //fill the background
    $background = imagecolorallocate($image, 255, 255, 255);
    
    //define colors for circles
    $red = imagecolorallocate($image, 255, 0, 0);
    $green = imagecolorallocate($image, 0, 255, 0);
    $blue = imagecolorallocate($image, 0, 0, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    $yellow = imagecolorallocate($image, 255, 255, 0);
    
    //create colors array and define the color for current session
    $colors = array($blue, $red, $green, $black, $yellow);
    $circle_color = $colors[rand(0, 4)];
    
    for ($i = 0; $i < $circle_num; $i++) {
            $cx = define_center_x($width, $radius);
            $cy = define_center_x($heigth, $radius);
            $diameter = $radius * 2;
            imageellipse($image, $cx, $cy, $diameter, $diameter, $circle_color);
        }
    header("Content-type: image/png");
    imagepng($image);
    imagedestroy($image);
?>