<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/points-flow-package',
    ],
    function () {
        Route::any('points-flow-package/records/data/index', 'DataControllerContract@getIndexData')
            ->name('back.points-flow-package.records.data.index');

        Route::resource(
            'records', 'ResourceControllerContract',
            [
                'as' => 'back.points-flow-package',
            ]
        );
    }
);
