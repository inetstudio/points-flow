<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'namespace' => 'InetStudio\PointsFlowPackage\Actions\Contracts\Http\Controllers\Back',
        'middleware' => ['web', 'back.auth'],
        'prefix' => 'back/points-flow-package',
    ],
    function () {
        Route::any('points-flow-package/actions/data/index', 'DataControllerContract@getIndexData')
            ->name('back.points-flow-package.actions.data.index');

        Route::post('points-flow-package/actions/utility/suggestions', 'UtilityControllerContract@getSuggestions')
            ->name('back.points-flow-package.actions.utility.suggestions');

        Route::resource(
            'actions', 'ResourceControllerContract',
            [
                'as' => 'back.points-flow-package',
            ]
        );
    }
);
