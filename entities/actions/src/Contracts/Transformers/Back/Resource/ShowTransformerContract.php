<?php

namespace InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource;

use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;

/**
 * Interface ShowTransformerContract.
 */
interface ShowTransformerContract
{
    /**
     * Трансформация данных.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     */
    public function transform(ActionModelContract $item): array;
}
