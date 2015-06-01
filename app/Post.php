<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public $thumbnailClass = '';


    public function determineThumnailBucket() {
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
