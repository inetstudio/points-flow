<?php

namespace InetStudio\PointsFlowPackage\Actions\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\PointsFlowPackage\Actions\Contracts\Http\Requests\Back\SaveItemRequestContract;

/**
 * Class SaveItemRequest.
 */
class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'name.max' => 'Поле «Название» не должно превышать 255 символов',
            'alias.required' => 'Поле «Алиас» обязательно для заполнения',
            'alias.max' => 'Поле «Алиас» не должно превышать 255 символов',
            'alias.unique' => 'Такое значение поля «Алиас» уже существует',
            'points.required' => 'Поле «Количество баллов» обязательно для заполнения',
            'points.integer' => 'Поле «Количество баллов» должно содержать целое число',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'alias' => 'required|max:255|unique:points_flow_actions,alias,'.$this->get('action_id'),
            'points' => 'required|integer',
        ];
    }
}
