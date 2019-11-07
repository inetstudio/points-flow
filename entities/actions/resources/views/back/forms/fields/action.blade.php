@inject('actionsService', 'InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\ItemsServiceContract')

@php
    $item = $value;
@endphp

{!! Form::dropdown('action_id', $item->action_id, [
    'label' => [
        'title' => 'Действие',
    ],
    'field' => [
        'class' => 'select2-drop form-control',
        'data-placeholder' => 'Выберите действие',
        'style' => 'width: 100%',
        'data-source' => route('back.points-flow-package.actions.utility.suggestions'),
    ],
    'options' => [
        'values' => [null => ''] + $actionsService->getItemById(old('action_id') ? old('action_id') : (int) $item->action_id)->pluck('name', 'id')->toArray(),
    ],
]) !!}
