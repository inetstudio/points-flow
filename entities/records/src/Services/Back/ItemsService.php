<?php

namespace InetStudio\PointsFlowPackage\Records\Services\Back;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Services\Back\ItemsServiceContract;

/**
 * Class ItemsService.
 */
class ItemsService extends BaseService implements ItemsServiceContract
{
    /**
     * ItemsService constructor.
     *
     * @param  RecordModelContract  $model
     */
    public function __construct(RecordModelContract $model)
    {
        parent::__construct($model);
    }

    /**
     * Сохраняем модель.
     *
     * @param  array  $data
     * @param  int  $id
     *
     * @return RecordModelContract
     *
     * @throws BindingResolutionException
     */
    public function save(array $data, int $id): RecordModelContract
    {
        $action = ($id) ? 'отредактирована' : 'создана';

        $itemData = Arr::only($data, $this->model->getFillable());
        $item = $this->saveModel($itemData, $id);

        event(
            app()->make(
                'InetStudio\PointsFlowPackage\Records\Contracts\Events\Back\ModifyItemEventContract',
                compact('item')
            )
        );

        Session::flash('success', 'Запись успешно '.$action);

        return $item;
    }
}
