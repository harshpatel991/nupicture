<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public static function getImageUploadPath() {
        return '';
    }

    public static function getBackupImageUploadPath() {
        return public_path().'/upload/';
    }

    public static $categories = ['art', 'cute', 'design', 'funny', 'how-to', 'interesting', 'movies', 'news', 'photography', 'tech', 'tv'];

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
