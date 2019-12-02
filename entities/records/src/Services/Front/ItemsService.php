<?php

namespace InetStudio\PointsFlowPackage\Records\Services\Front;

use Illuminate\Support\Collection;
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
     * @param  array  $additionalInfo
     * @param  int  $points
     * @param  bool  $update
     *
     * @return RecordModelContract|null
     *
     * @throws BindingResolutionException
     */
    public function recordAction(int $userId, string $actionAlias, array $additionalInfo = [], int $points = 0, bool $update = false): ?RecordModelContract
    {
        $usersService = app()->make('InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract');
        $actionsService = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract');

        $user = $usersService->getItemById($userId);
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        if (! $user['id'] || ! $action) {
            return null;
        }

        $records = $this->getActionRecords($userId, $actionAlias);
        $pointsSum = $records->sum('points');

        if (($action['single'] && ! $update) || ($action['points_limit'] > 0 && $pointsSum >= $action['points_limit'])) {
            if ($records->count() > 0) {
                return null;
            }
        }

        $data = [
            'user_id' => $user['id'],
            'action_id' => $action['id'],
            'points' => ($points) ? $points : $action['points'],
        ];

        if (! empty($additionalInfo)) {
            $data['additional_info'] = $additionalInfo;
        }

        if ($action['single'] && $update) {
            $record = $records->last();

            $recordId = $record['id'] ?? 0;
            $pointsDifference = ($record) ? $points - $record['points'] : 0;
        }

        $record = $this->saveModel($data, $recordId ?? 0);

        event(
            app()->make(
                'InetStudio\PointsFlowPackage\Records\Contracts\Events\RecordActionEventContract',
                [
                    'user' => $user,
                    'points' => $record['points'],
                    'update' => $update,
                    'pointsDifference' => $pointsDifference ?? 0,
                ]
            )
        );

        return $record;
    }

    /**
     * Получаем записи по действию и пользователю.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return Collection
     *
     * @throws BindingResolutionException
     */
    public function getActionRecords(int $userId, string $actionAlias): Collection
    {
        $usersService = app()->make('InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract');
        $actionsService = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract');

        $user = $usersService->getItemById($userId);
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        if (! $user['id'] || ! $action) {
            return collect([]);
        }

        return $this->getModel()
            ->where(
                [
                    ['user_id', '=', $user['id']],
                    ['action_id', '=', $action['id']],
                ]
            )
            ->get();
    }

    /**
     * Проверяем, что есть записи о начислении баллов.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return bool
     *
     * @throws BindingResolutionException
     */
    public function hasActionRecords(int $userId, string $actionAlias): bool
    {
        $records = $this->getActionRecords($userId, $actionAlias);

        if ($records->count() > 0) {
            return true;
        }

        return false;
    }

    /**
     * Проверяем, что достигнут лимит баллов.
     *
     * @param  int  $userId
     * @param  string  $actionAlias
     *
     * @return bool
     *
     * @throws BindingResolutionException
     */
    public function hasActionLimitReached(int $userId, string $actionAlias): bool
    {
        $actionsService = app()->make('InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract');
        $action = $actionsService->getModel()->where('alias', '=', $actionAlias)->first();

        $records = $this->getActionRecords($userId, $actionAlias);
        $pointsSum = $records->sum('points');

        if ($action['points_limit'] > 0 && $pointsSum >= $action['points_limit']) {
            return true;
        }

        return false;
    }

    /**
     * Получаем записи по действию и пользователю.
     *
     * @param  int  $userId
     *
     * @return Collection
     *
     * @throws BindingResolutionException
     */
    public function getUserRecords(int $userId): Collection
    {
        $usersService = app()->make('InetStudio\ACL\Users\Contracts\Services\Front\ItemsServiceContract');
        $user = $usersService->getItemById($userId);

        if (! $user['id']) {
            return collect([]);
        }

        return $this->getModel()
            ->where(
                [
                    ['user_id', '=', $user['id']],
                ]
            )
            ->get();
    }
}
