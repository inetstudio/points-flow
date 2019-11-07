<?php

namespace InetStudio\PointsFlowPackage\Actions\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class BindingsServiceProvider.
 */
class BindingsServiceProvider extends BaseServiceProvider implements DeferrableProvider
{
    /**
     * @var  array
     */
    public $bindings = [
        'InetStudio\PointsFlowPackage\Actions\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\PointsFlowPackage\Actions\Events\Back\ModifyItemEvent',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Events\ActionEndedEventContract' => 'InetStudio\PointsFlowPackage\Actions\Events\ActionEndedEvent',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Controllers\Back\ResourceController',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Controllers\Back\DataController',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Controllers\Back\UtilityControllerContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Controllers\Back\UtilityController',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Requests\Back\SaveItemRequest',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Data\GetIndexDataResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\CreateResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\CreateResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\EditResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\EditResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Utility\SuggestionsResponse',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract' => 'InetStudio\PointsFlowPackage\Actions\Models\ActionModel',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\DataTables\IndexServiceContract' => 'InetStudio\PointsFlowPackage\Actions\Services\Back\DataTables\IndexService',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\PointsFlowPackage\Actions\Services\Back\ItemsService',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\UtilityServiceContract' => 'InetStudio\PointsFlowPackage\Actions\Services\Back\UtilityService',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\PointsFlowPackage\Actions\Services\Front\ItemsService',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\PointsFlowPackage\Actions\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Resource\ShowTransformerContract' => 'InetStudio\PointsFlowPackage\Actions\Transformers\Back\Resource\ShowTransformer',
        'InetStudio\PointsFlowPackage\Actions\Contracts\Transformers\Back\Utility\SuggestionTransformerContract' => 'InetStudio\PointsFlowPackage\Actions\Transformers\Back\Utility\SuggestionTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->bindings);
    }
}
