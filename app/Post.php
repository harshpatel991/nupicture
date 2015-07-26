<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public static $categories = ['art', 'cute', 'funny', 'interesting', 'movies', 'news', 'photography', 'tv', 'woah'];

    public static $pendingPostStatus = 'pending_post';
    public static $rejectedStatus = 'rejected';
    public static $postedStatus = 'posted';

    public function getDates()
    {
        return ['created_at', 'updated_at', 'posted_at'];
    }
}
