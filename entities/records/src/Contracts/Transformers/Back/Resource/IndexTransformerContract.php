<?php

namespace InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource;

use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;

/**
 * Interface IndexTransformerContract.
 */
interface IndexTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  RecordModelContract  $item
     *
     * @return array
     */
    public function transform(RecordModelContract $item): array;
}
