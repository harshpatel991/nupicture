<?php namespace App\Http\Requests;

use Auth;
use App\Section;
use App\Http\Requests\Request;

class StorePostRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if (Auth::check())
        {
            if(Auth::user()->status === 'good' || Auth::user()->status === 'warning')
            {
                return true;
            }
        }

        return false;
    }

    private $IMAGE_RULES = 'required|max:2000|image|mimes:png,jpg,jpeg,gif';
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $rules = [
            'title' => 'required|max:200',
            'category' => 'required|max:50',
            'summary' => 'required|max:1000',
            'thumbnail' => $this->IMAGE_RULES
        ];

        foreach($this->request->all() as $sectionId => $section)
        {
            if(strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId.'.0'] = 'max:200'; //optional content rule
                $rules[$sectionId.'.1'] = 'required|min:1|max:2000'; //content rule
            }

            elseif(strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId.'.0'] = $this->IMAGE_RULES; //content rule
                $rules[$sectionId.'.1'] = 'max:200'; //optional rule
            }

            elseif(strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId] = 'max:200'; //optional content rule
            }

            elseif(strpos($sectionId, Section::$YOUTUBE_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId] = ['required', 'max:200', 'regex:'.Section::$YOUTUBE_ID_REGEX]; //content rule
            }

            elseif(strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId] = 'required|min:1|max:200'; //content rule
            }
        }

        return $rules;
	}

    public function messages()
    {
        $contentSectionNumber = 1;
        $sourceSectionNumber = 1;

        $messages = [];

        $messages[Section::$TITLE_SECTION_NAME.'.required'] = 'Title is required';
        $messages[Section::$TITLE_SECTION_NAME.'.max'] = 'Title must be less than :max characters';

        $messages[Section::$CATEGORY_SECTION_NAME.'.required'] = 'Category is required';
        $messages[Section::$CATEGORY_SECTION_NAME.'.max'] = 'Category must be less than :max characters';

        $messages[Section::$SUMMARY_SECTION_NAME.'.required'] = 'Summary is required';
        $messages[Section::$SUMMARY_SECTION_NAME.'.max'] = 'Summary must be less than :max characters';

        $messages[Section::$THUMBNAIL_SECTION_NAME.'.required'] = 'Thumbnail is required';
        $messages[Section::$THUMBNAIL_SECTION_NAME.'.max'] = 'Thumbnail must be smaller than :max KB';
        $messages[Section::$THUMBNAIL_SECTION_NAME.'.image'] = 'Thumbnail must be an image';
        $messages[Section::$THUMBNAIL_SECTION_NAME.'.mimes'] = 'Thumbnail must be PNG, JPG, JPEG, or GIF';

        foreach($this->request->all() as $sectionId => $val)
        {
            if (strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE)
            {
                $messages[$sectionId . '.0.max'] = 'Section #' . $contentSectionNumber . ': Heading must be less than :max characters';

                $messages[$sectionId . '.1.required'] = 'Section #' . $contentSectionNumber . ': Text content is required';
                $messages[$sectionId . '.1.min'] = 'Section #' . $contentSectionNumber . ': Text content must be longer than :min characters';
                $messages[$sectionId . '.1.max'] = 'Section #' . $contentSectionNumber . ': Text content must be less than :max characters';
                $contentSectionNumber = $contentSectionNumber + 1;
            }
            elseif (strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE)
            {
                $messages[$sectionId . '.0.required'] = 'Section #' . $contentSectionNumber . ': Image is required';
                $messages[$sectionId . '.0.max'] = 'Section #' . $contentSectionNumber . ': Image must be smaller than :max KB';
                $messages[$sectionId . '.0.image'] = 'Section #' . $contentSectionNumber . ': File must be an image';
                $messages[$sectionId . '.0.mimes'] = 'Section #' . $contentSectionNumber . ': Image must be PNG, JPG, JPEG, or GIF';

                $messages[$sectionId . '.1.max'] = 'Section #' . $contentSectionNumber . ': Heading must be less than :max characters';
                $contentSectionNumber = $contentSectionNumber + 1;
            }
            elseif (strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $messages[$sectionId . '.max'] = 'Section #' . $contentSectionNumber . ': List number heading must be less than :max characters';
                $contentSectionNumber = $contentSectionNumber + 1;
            }
            elseif (strpos($sectionId, Section::$YOUTUBE_SECTION_NAME) !== FALSE)
            {
                $messages[$sectionId . '.required'] = 'Section #' . $contentSectionNumber . ': YouTube URL is required';
                $messages[$sectionId . '.max'] = 'Section #' . $contentSectionNumber . ': YouTube URL must be less than :max characters';
                $messages[$sectionId . '.regex'] = 'Section #' . $contentSectionNumber . ': YouTube URL does not match correct video format';
                $contentSectionNumber = $contentSectionNumber + 1;
            }
            elseif (strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE)
            {
                $messages[$sectionId . '.required'] = 'Source Section #' . $sourceSectionNumber . ': Source is required';
                $messages[$sectionId . '.min'] = 'Source Section #' . $sourceSectionNumber . ': Source must be longer than :min character';
                $messages[$sectionId . '.max'] = 'Source Section #' . $sourceSectionNumber . ': Source must be must be less than :max characters';
                $sourceSectionNumber = $sourceSectionNumber + 1;
            }
        }

        return $messages;
    }

}
