<?php

namespace InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource;

use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;

/**
 * Interface ShowTransformerContract.
 */
interface ShowTransformerContract
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
