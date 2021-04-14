<?php

    // Function for cropping image 
    function img_crop($image, $path, $width, $height) {

        // include ImageManipulator class
        require_once('ImageManipulator.php');
        $manipulator = new ImageManipulator();

        $manipulator->loadImage($image);
        
        $w  = $manipulator->getWidth();
        $h = $manipulator->getHeight();


        // This decides if we crop to width or height
        if ($w > $h) {
            $x = $h;
        } else {
            $x = $w;
        }
        $x = $x/2;

        $centerX = round($w / 2);
        $centerY = round($h / 2);
        

        // These will move the cropping to the center of the image
        $x1 = $centerX - $x;
        $y1 = $centerY - $x;

        $x2 = $centerX + $x;
        $y2 = $centerY + $x;
        
        // Finally, image is center cropped
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        
        // saving file to uploads folder
        $manipulator->save($path);

        $manipulator->loadImage($path);
        $newImage = $manipulator->resample($width,$height);
        $manipulator->save($path);
        
        return true;
    }
