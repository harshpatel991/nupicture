<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['views']; //TODO: is this required?

    public $thumbnailClass = ''; //TODO: remove this after finding where its used

    public static $contentTypes = ['image', 'short_text', 'list', 'article']; //TODO: remove this after finding where its used
    public static $postNames = ['image' => 'Image', 'short_text' => 'Short Text', 'list' => 'List', 'article' => 'Article']; //TODO: remove this after finding where its used

    public static $categories = ['art', 'cute', 'funny', 'interesting', 'movies', 'news', 'photography', 'tv', 'woah'];

    public static $pendingPostStatus = 'pending_post';
    public static $rejectedStatus = 'rejected';
    public static $postedStatus = 'posted';

    public function getStrippedContent()
    {
        return strip_tags($this->content);
    }
}
