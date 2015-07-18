<?php namespace App\Http\Requests;

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
		//TODO: make sure the user is allowed to make this request
        return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{

        //TODO: validate the post

        $rules = [
            'title' => 'required|max:200',
            'category' => 'required|max:50'
        ];

        foreach($this->request->all() as $sectionId => $section)
        {

            if(strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId.'.0'] = 'min:0|max:200'; //optional content rule
                $rules[$sectionId.'.1'] = 'required|min:1|max:2000'; //content rule
            }

            elseif(strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId.'.0'] = 'required|min:1|max:2000|image|mimes:png,jpg,jpeg,gif'; //content rule
            }

            elseif(strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId] = 'max:200'; //optional content rule
            }

            elseif(strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE)
            {
                $rules[$sectionId] = 'required|min:1|max:200'; //content rule
            }

        }

        return $rules;


	}

//    public function messages()
//    {
//        //TODO: better error messages when creating a post
////        $messages = [];
////        foreach($this->request->get('items') as $key => $val)
////        {
////            $messages['items.'.$key.'.max'] = 'The field labeled "Book Title '.$key.'" must be less than :max characters.';
////        }
////        return $messages;
//    }

}
