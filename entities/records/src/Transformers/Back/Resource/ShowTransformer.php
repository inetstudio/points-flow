<?php

namespace InetStudio\PointsFlowPackage\Records\Transformers\Back\Resource;

use League\Fractal\TransformerAbstract;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource\ShowTransformerContract;

/**
 * Class ShowTransformer.
 */
class ShowTransformer extends TransformerAbstract implements ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  RecordModelContract  $item
     *
     * @return array
     */
    public function transform(RecordModelContract $item): array
    {
        return $item->toArray();
    }
}
