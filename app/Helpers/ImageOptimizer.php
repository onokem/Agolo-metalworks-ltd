<?php

namespace App\Helpers;

class ImageOptimizer
{
    public static function optimize($sourcePath, $destinationPath, $width = null, $height = null, $quality = 80)
    {
        $info = getimagesize($sourcePath);
        if ($info === false) return false;

        switch ($info[2]) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($sourcePath);
                break;
            default:
                return false;
        }

        if ($width && $height) {
            $newImage = imagecreatetruecolor($width, $height);
            
            // Preserve transparency for PNG images
            if ($info[2] === IMAGETYPE_PNG) {
                imagecolortransparent($newImage, imagecolorallocate($newImage, 0, 0, 0));
                imagealphablending($newImage, false);
                imagesavealpha($newImage, true);
            }
            
            imagecopyresampled(
                $newImage, $image,
                0, 0, 0, 0,
                $width, $height,
                imagesx($image), imagesy($image)
            );
            $image = $newImage;
        }

        // Create the destination directory if it doesn't exist
        $destDir = dirname($destinationPath);
        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        // Save the image with the specified quality
        switch ($info[2]) {
            case IMAGETYPE_JPEG:
                imagejpeg($image, $destinationPath, $quality);
                break;
            case IMAGETYPE_PNG:
                // Convert quality scale from 0-100 to 0-9
                $pngQuality = floor((100 - $quality) / 11.111111);
                imagepng($image, $destinationPath, $pngQuality);
                break;
            case IMAGETYPE_GIF:
                imagegif($image, $destinationPath);
                break;
        }

        imagedestroy($image);
        if (isset($newImage)) {
            imagedestroy($newImage);
        }

        return true;
    }
}
