<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateAutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_id' => 'required',
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'number' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'client_id.required' => 'Ошибка создания клиента, начните все сначала',
            'mark.required' => 'Укажите марку автомобиля',
            'color.required' => 'Выберите цвет автомобиля',
            'number.required' => 'Укажите гос. номер автомобиля',
            'status.required' => 'Статус не определен',
        ];
    }
}
