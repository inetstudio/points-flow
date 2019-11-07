<?php

namespace InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back;

use Illuminate\Http\Request;
use InetStudio\PointsFlowPackage\Records\Contracts\Http\Responses\Back\Data\GetIndexDataResponseContract;

/**
 * Interface DataControllerContract.
 */
interface DataControllerContract
{
    /**
     * Получаем данные для отображения в таблице.
     *
     * @param  Request  $request
     * @param  GetIndexDataResponseContract  $response
     *
     * @return GetIndexDataResponseContract
     */
    public function getIndexData(Request $request, GetIndexDataResponseContract $response): GetIndexDataResponseContract;
}
