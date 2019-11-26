<?php

namespace InetStudio\PointsFlowPackage\Records\Providers;

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
        'InetStudio\PointsFlowPackage\Records\Contracts\Events\Back\ModifyItemEventContract' => 'InetStudio\PointsFlowPackage\Records\Events\Back\ModifyItemEvent',
        'InetStudio\PointsFlowPackage\Records\Contracts\Events\RecordActionEventContract' => 'InetStudio\PointsFlowPackage\Records\Events\RecordActionEvent',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back\ResourceControllerContract' => 'InetStudio\PointsFlowPackage\Records\Http\Controllers\Back\ResourceController',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back\DataControllerContract' => 'InetStudio\PointsFlowPackage\Records\Http\Controllers\Back\DataController',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Requests\Back\SaveItemRequestContract' => 'InetStudio\PointsFlowPackage\Records\Http\Requests\Back\SaveItemRequest',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Data\GetIndexDataResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\CreateResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\CreateResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\DestroyResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\DestroyResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\EditResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\EditResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\IndexResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\IndexResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\SaveResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\SaveResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\ShowResponseContract' => 'InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource\ShowResponse',
        'InetStudio\PointsFlowPackage\Records\Contracts\Listeners\RecordActionListenerContract' => 'InetStudio\PointsFlowPackage\Records\Listeners\RecordActionListener',
        'InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract' => 'InetStudio\PointsFlowPackage\Records\Models\RecordModel',
        'InetStudio\PointsFlowPackage\Records\Contracts\Services\Back\DataTables\IndexServiceContract' => 'InetStudio\PointsFlowPackage\Records\Services\Back\DataTables\IndexService',
        'InetStudio\PointsFlowPackage\Records\Contracts\Services\Back\ItemsServiceContract' => 'InetStudio\PointsFlowPackage\Records\Services\Back\ItemsService',
        'InetStudio\PointsFlowPackage\Records\Contracts\Services\Front\ItemsServiceContract' => 'InetStudio\PointsFlowPackage\Records\Services\Front\ItemsService',
        'InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource\IndexTransformerContract' => 'InetStudio\PointsFlowPackage\Records\Transformers\Back\Resource\IndexTransformer',
        'InetStudio\PointsFlowPackage\Records\Contracts\Transformers\Back\Resource\ShowTransformerContract' => 'InetStudio\PointsFlowPackage\Records\Transformers\Back\Resource\ShowTransformer',
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
