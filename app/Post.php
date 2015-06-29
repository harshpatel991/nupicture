<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['total_views', 'views_since_payment'];

    public $thumbnailClass = '';

    public static $cashPerPoint = .0025;
    public static $contentTypes = ['image', 'short_text', 'list', 'article'];
    public static $postNames = ['image' => 'Image', 'short_text' => 'Short Text', 'list' => 'List', 'article' => 'Article'];
    public static $basePoints = ['image' => 40, 'short_text' => 40, 'list' => 200, 'article' => 400];
    public static $perViewPoints = ['image' => 1, 'short_text' => 1, 'list' => 2, 'article' => 3];

    public function determineThumbnailBucket() {
        list($width, $height, $type, $attr) = getimagesize('upload/'.$this->thumbnail_image);

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
