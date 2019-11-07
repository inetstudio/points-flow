<?php

namespace InetStudio\PointsFlowPackage\Actions\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  ActionModelContract  $model
     */
    public function __construct(ActionModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return ActionModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): ActionModelContract
    {
        $action = ($id) ? 'отредактировано' : 'создано';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        event(
            app()->make(
                'InetStudio\PointsFlowPackage\Actions\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Действие «'.$item->name.'» успешно '.$action);

        return $item;
    }
}
