<?php

namespace InetStudio\PointsFlowPackage\Records\Transformers\Back\Resource;

use Throwable;
use League\Fractal\TransformerAbstract;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource\IndexTransformerContract;

/**
 * Class IndexTransformer.
 */
class IndexTransformer extends TransformerAbstract implements IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  RecordModelContract  $item
     *
     * @return array
     *
     * @throws Throwable
     */
    public function transform(RecordModelContract $item): array
    {
        return [
            'id' => (int) $item['id'],
            'user' => view(
                    'admin.module.points-flow-package.records::back.partials.datatables.user',
                    compact('item')
                )
                ->render(),
            'action' => view(
                    'admin.module.points-flow-package.records::back.partials.datatables.action',
                    compact('item')
                )
                ->render(),
            'points' => view(
                    'admin.module.points-flow-package.records::back.partials.datatables.points',
                    compact('item')
                )
                ->render(),
            'created_at' => (string) $item['created_at'],
            'updated_at' => (string) $item['updated_at'],
            'actions' => view(
                    'admin.module.points-flow-package.records::back.partials.datatables.actions',
                    compact('item')
                )
                ->render(),
        ];
    }
}
