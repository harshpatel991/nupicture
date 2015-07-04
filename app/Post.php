<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['total_views', 'views_since_payment'];

    public $thumbnailClass = '';

    public static $contentTypes = ['image', 'short_text', 'list', 'article'];
    public static $postNames = ['image' => 'Image', 'short_text' => 'Short Text', 'list' => 'List', 'article' => 'Article'];


    public function getStrippedContent()
    {
        return strip_tags($this->content);
    }
}
