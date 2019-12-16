<?php

namespace InetStudio\PointsFlowPackage\Records\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back\ExportControllerContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Export\ItemsExportResponseContract;
use InetStudio\AdminPanel\Base\Http\Controllers\Controller;

/**
 * Class ExportController.
 */
class ExportController extends Controller implements ExportControllerContract
{
    /**
     * Экспортируем записи.
     *
     * @param  Request  $request
     * @param  ItemsExportResponseContract  $response
     *
     * @return ItemsExportResponseContract
     */
    public function exportItems(Request $request, ItemsExportResponseContract $response): ItemsExportResponseContract
    {
        return $response;
    }
}
