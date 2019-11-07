<?php

namespace InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\ShowResponseContract;

/**
 * Class ShowResponse.
 */
class ShowResponse implements ShowResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * ShowResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при показе объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    public function toResponse($request)
    {
        $id = $request->route('action');

        $item = $this->resourceService->getItemById($id);

        return response()->json($item->toArray());
    }
}
