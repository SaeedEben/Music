<?php

namespace App\Http\Requests\Music\Genre;

use App\Models\Music\Genre;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreGenreRequest
 *
 * @package App\Http\Requests\Music\Genre
 *
 * @mixin Genre
 */
class StoreGenreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:10',
        ];
    }
}
