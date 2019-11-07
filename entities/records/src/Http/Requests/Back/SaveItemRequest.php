<?php

namespace InetStudio\PointsFlowPackage\Records\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\PointsFlowPackage\Records\Contracts\Http\Requests\Back\SaveItemRequestContract;

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
            'user_id.required' => 'Поле «Пользователь» обязательно для заполнения',
            'user_id.exists' => 'Пользователь с указанным параметром id не существует',
            'action_id.required' => 'Поле «Действие» обязательно для заполнения',
            'action_id.exists' => 'Действие с указанным параметром id не существует',
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
            'user_id' => 'required|exists:users,id',
            'action_id' => 'required|exists:points_flow_actions,id',
            'points' => 'required|integer',
        ];
    }
}
