<?php

namespace InetStudio\PointsFlowPackage\Records\Models\Traits;

use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;

trait HasPointsFlowRecords
{
    public static function getPointsFlowRecordClassName(): string
    {
        $model = app()->make(RecordModelContract::class);

        return get_class($model);
    }

    public function points_flow_records()
    {
        $className = $this->getPointsFlowRecordClassName();

        return $this->morphMany($className, 'recordable');
    }
}
