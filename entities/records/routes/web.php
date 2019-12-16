<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\PointsFlowPackage\Records\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/points-flow-package',
    ],
    function () {
        Route::any('records/data/index', 'DataControllerContract@getIndexData')
            ->name('back.points-flow-package.records.data.index');

        Route::get('records/export', 'ExportControllerContract@exportItems')
            ->name('back.points-flow-package.records.export');

        Route::resource(
            'records', 'ResourceControllerContract',
            [
                'as' => 'back.points-flow-package',
            ]
        );
    }
);
