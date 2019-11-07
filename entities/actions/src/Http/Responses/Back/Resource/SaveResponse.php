<?php

namespace InetStudio\PointsFlowPackage\Actions\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\PointsFlowPackage\Actions\Contracts\Services\Back\ItemsServiceContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Http\Responses\Back\Resource\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract
{
    /**
     * @var ItemsServiceContract
     */
    protected $resourceService;

    /**
     * SaveResponse constructor.
     *
     * @param  ItemsServiceContract  $resourceService
     */
    public function __construct(ItemsServiceContract $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|null
     */
    public function toResponse($request)
    {
        $id = $request->route('action', 0);
        $data = $request->all();

        $item = $this->resourceService->save($data, $id);

        return response()->redirectToRoute(
            'back.points-flow-package.actions.edit',
            [
                $item['id'],
            ]
        );
    }
}
