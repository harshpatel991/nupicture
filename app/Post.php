<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public static function getImageUploadPath() {
        return public_path() . '/upload/';
    }

    public static $categories = ['art', 'cute', 'funny', 'how-to', 'interesting', 'movies', 'news', 'photography', 'tv', 'woah'];

    public static $pendingPostStatus = 'pending_post';
    public static $rejectedStatus = 'rejected';
    public static $postedStatus = 'posted';

    /**
     * Required so Carbon knows what to format as Carbon date
     * @return array
     */
    public function getDates()
    {
        return ['created_at', 'updated_at', 'posted_at'];
    }
}
