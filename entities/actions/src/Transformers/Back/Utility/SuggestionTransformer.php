<?php

namespace InetStudio\PointsFlowPackage\Actions\Transformers\Back\Utility;

use InetStudio\AdminPanel\Base\Transformers\BaseTransformer;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Utility\SuggestionTransformerContract;

/**
 * Class SuggestionTransformer.
 */
class SuggestionTransformer extends BaseTransformer implements SuggestionTransformerContract
{
    /**
     * @var string
     */
    protected $type;

    /**
     * Устанавливаем тип.
     *
     * @param  string  $type
     */
    public function setType(string $type = ''): void
    {
        $this->type = $type;
    }

    /**
     * Подготовка данных для отображения в выпадающих списках.
     *
     * @param  ActionModelContract  $item
     *
     * @return array
     */
    public function transform(ActionModelContract $item): array
    {
        return ($this->type == 'autocomplete')
            ? [
                'value' => $item['name'],
                'data' => [
                    'id' => $item['id'],
                    'type' => get_class($item),
                    'title' => $item['name'],
                ],
            ]
            : [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
    }
}
