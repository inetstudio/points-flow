<?php

namespace InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Utility;

use League\Fractal\Resource\Collection as FractalCollection;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;

/**
 * Interface SuggestionTransformerContract.
 */
interface SuggestionTransformerContract
{
    /**
     * Подготовка данных для отображения в выпадающих списках.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     */
    public function transform(ActionModelContract $item): array;

    /**
     * Обработка коллекции объектов.
     *
     * @param $items
     *
     * @return FractalCollection
     */
    public function transformCollection($items): FractalCollection;
}
