<?php

namespace InetStudio\PointsFlowPackage\Records\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\PointsFlowPackage\Records\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var RecordModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  RecordModelContract  $item
     */
    public function __construct(RecordModelContract $item)
    {
        $this->item = $item;
    }
}
