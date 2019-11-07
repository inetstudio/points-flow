<?php

namespace InetStudio\PointsFlowPackage\Actions\Transformers\Back\Resource;

use League\Fractal\TransformerAbstract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource\ShowTransformerContract;

/**
 * Class ShowTransformer.
 */
class ShowTransformer extends TransformerAbstract implements ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     */
    public function transform(ActionModelContract $item): array
    {
        return $item->toArray();
    }
}
