<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class Section extends Model {

    static $TOKEN_SECTION_NAME = '_token';
    static $TEXT_SECTION_NAME = 'section-text';
    static $IMAGE_SECTION_NAME = 'section-image';
    static $LIST_NUMBER_SECTION_NAME = 'section-listnumber';
    static $YOUTUBE_SECTION_NAME = 'section-youtube';
    static $SOURCE_SECTION_NAME = 'section-source';
    static $TITLE_SECTION_NAME = 'title';
    static $CATEGORY_SECTION_NAME = 'category';
    static $SUMMARY_SECTION_NAME = 'summary';
    static $THUMBNAIL_SECTION_NAME = 'thumbnail';

    static $YOUTUBE_ID_REGEX = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";

    public function make($postId, $type, $optionalContent, $content)
    {
        $this->post_id = $postId;
        $this->type = $type;
        $this->optional_content = $optionalContent;
        $this->content = $content;
    }

    public static function uploadImage($image, $fileName, $extension)
    {
        // checking file is valid.
        if (!$image->isValid()) {
            return 'File is not valid';
        }
        $destinationPath = public_path() . '/upload/';


        if ($image->getClientSize() > 4000000) {
            return 'File is too large';
        }
        if ($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
            return 'File extension is not supported';
        }

        try {
            $image->move($destinationPath, $fileName); // uploading file to given path
        } catch (FileException $e) {
            return 'Could not move the file: ' . $e->getMessage();
        }

        return true;
    }

    public function isTextSection() {
        return $this->type === Section::$TEXT_SECTION_NAME;
    }

    public function isImageSection() {
        return $this->type === Section::$IMAGE_SECTION_NAME;
    }

    public function isListNumberSection() {
        return $this->type === Section::$LIST_NUMBER_SECTION_NAME;
    }

    public function isYoutubeSection() {
        return $this->type === Section::$YOUTUBE_SECTION_NAME;
    }

    public function isSourceSection() {
        return $this->type === Section::$SOURCE_SECTION_NAME;
    }

    public function validate() {

    }

}
