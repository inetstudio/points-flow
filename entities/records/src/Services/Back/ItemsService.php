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


    /**
     * Удаляем последнюю запись по действию.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @throws BindingResolutionException
     */
    public function removeLastRecord(int $userId, string $actionAlias): void
    {
        $actionsService = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract');
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        $records = $this->getModel()
            ->where(
                [
                    ['user_id', '=', $userId ?? 0],
                    ['action_id', '=', $action['id'] ?? 0],
                ]
            )
            ->get();

        $record = $records->last();

        $this->destroy($record['id']);
    }

    /**
     * Удаляем модель.
     *
     * @param  mixed  $id
     *
     * @return bool|null
     *
     * @throws BindingResolutionException
     */
    public function destroy($id): ?bool
    {
        $record = $this->getItemById($id);

        $result = null;

        if ($record) {
            $usersService = app()->make('InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract');
            $user = $usersService->getItemById($record['user_id']);
            $points = $record['points'];

            $result = $this->model::destroy($id);

            if ($result) {
                event(
                    app()->make(
                        'InetStudio\PointsFlowPackage\Records\Contracts\Events\RemoveRecordEventContract',
                        compact('user', 'points')
                    )
                );
            }
        }

        return $result;
    }
}
