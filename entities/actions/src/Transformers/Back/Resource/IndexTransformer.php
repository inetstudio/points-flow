<?php

namespace InetStudio\PointsFlowPackage\Actions\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(ActionModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'name' => $item['name'],
            'alias' => $item['alias'],
            'points' => (int) $item['points'],
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                    'admin.module.points-flow-package.actions::back.partials.datatables.actions',
                    compact('item')
                )
                ->render(),
        ];
    }
}
