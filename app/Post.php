<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public $thumbnailClass = '';

    public static $cashPerPoint = .0025;
    public static $postNames = ['Image', 'Short Text', 'List', 'Article'];
    public static $basePoints = [40, 40, 200, 400];
    public static $perViewPoints = [1, 1, 2, 3];

    public function determineThumbnailBucket() {
        list($width, $height, $type, $attr) = getimagesize('upload/'.$this->content);

        $ratio = $height/$width;

        if ($ratio <= 1.2) //it's a square shape
        {
            return 'sm';
        }
        else if($ratio < 1.4)
        {
            return 'md';
        }
        else
        {
            return 'lg';
        }
    }


}
