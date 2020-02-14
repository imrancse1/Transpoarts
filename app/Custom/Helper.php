<?php  

namespace App\Custom;
class Helper {

	public static function imageUploadRaw($insertId = null, $imageData = null, $folderPath = null, $height = null, $width = null)
    {
        $image = isset($imageData) ? $imageData : null;
        if (empty($image)) {
            $fileName = NULL;
        } else {
            if ($image->isValid()) {
                $destinationPath = public_path() .'/'. $folderPath;
                $extension = $image->getClientOriginalExtension();
                $uniqPath = substr($imageData->getPathName(),16,4);
                $fileName = $insertId . '-' . date("Ymdhis") . $uniqPath . '.' . $extension; // renameing image
                $image->move($destinationPath,$fileName);
            }
        }
        if (file_exists($destinationPath.$fileName) && ($height != null || $width != null)) {
            self::imageResize($destinationPath.$fileName,$height,$width);
        }
        return $fileName;
    }

    public static function imageResize($imageData = null, $newHeight = null, $newWidth = null)
    {
        header('Content-Type: image/jpeg');
        // Get new sizes
        list($width, $height) = getimagesize($imageData);
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        $source = imagecreatefromjpeg($imageData);
        imagecopyresized($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagejpeg($newImage,$imageData);
        imagedestroy($newImage);
        return;
    }
    public static function isSelected($type)
    {
        // $search = [1, 0];
        // $replace = ['Selected', 'Not Selected'];
        // return str_replace($search, $replace, $type);
        return str_replace([1, 0], ['Selected','Not Selected'], $type);
    }
    public static function getStatus($action=null)
    {
        $search = ['inactive','active','delete'];
        $replace = [0, 1, 2];
        return str_replace($search, $replace, $action);
        // return str_replace(['inactive','active','delete'], [0, 1, 2], $action);
    }

    public static function placementType($type)
    {
        $search = [1,2,3];
        $replace = ['Normal Product','Slider Product','Selected Product'];
        return str_replace($search, $replace, $type);
    }
}


  