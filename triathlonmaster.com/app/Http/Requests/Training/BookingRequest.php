<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BookingRequest
 * @package App\Http\Requests
 * @property int $location
 * @property string $today
 */
class BookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'today' => 'date_format:Y-m-d',
        ];
    }

    public function getToday()
    {
        return $this->get('today', today()->format('Y-m-d'));
    }
}
