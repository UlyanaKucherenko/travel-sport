<?php

namespace App\Http\Requests\Training;

use App\Http\Requests\Request;

class UpdateTrainingRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'time' => 'required|numeric|min:0|max:22',
            'date' => 'required|date',
            'booked_by' => 'required|numeric|min:0',
        ];
    }
}
