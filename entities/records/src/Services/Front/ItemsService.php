<?php

namespace InetStudio\PointsFlowPackage\Records\Services\Front;

use InetStudio\AdminPanel\Base\Services\BaseService;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Services\Front\ItemsServiceContract;

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
     * Записываем действие пользователя.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return RecordModelContract|null
     *
     * @throws BindingResolutionException
     */
    public function recordAction(int $userId, string $actionAlias): ?RecordModelContract
    {
        $usersService = app()->make('InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract');
        $actionsService = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract');

        $user = $usersService->getItemById($userId);
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        if (! $user['id'] || ! $action) {
            return null;
        }

        if ($action['single']) {
            $recordsCount = $this->getModel()
                ->where(
                    [
                        ['user_id', '=', $user['id']],
                        ['action_id', '=', $action['id']],
                    ]
                )
                ->count();

            if ($recordsCount > 0) {
                return null;
            }
        }

        $data = [
            'user_id' => $user['id'],
            'action_id' => $action['id'],
            'points' => $action['points'],
        ];

        $record = $this->saveModel($data, 0);

        return $record;
    }
}
