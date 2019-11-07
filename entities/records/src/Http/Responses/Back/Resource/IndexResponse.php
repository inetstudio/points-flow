<?php

namespace InetStudio\PointsFlowPackage\Records\Http\Responses\Back\Resource;

use Illuminate\Http\Request;
use InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Resource\IndexResponseContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Services\Back\DataTables\IndexServiceContract as DataTableServiceContract;

/**
 * Class IndexResponse.
 */
class IndexResponse implements IndexResponseContract
{
    /**
     * @var array
     */
    protected $datatableService;

    /**
     * IndexResponse constructor.
     *
     * @param  DataTableServiceContract  $datatableService
     */
    public function __construct(DataTableServiceContract $datatableService)
    {
        $this->datatableService = $datatableService;
    }

    /**
     * Возвращаем ответ при открытии списка объектов.
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $table = $this->datatableService->html();

        return view('admin.module.points-flow-package.records::back.pages.index', compact('table'));
    }
}
