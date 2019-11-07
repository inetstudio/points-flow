<?php

namespace InetStudio\PointsFlowPackage\Actions\Events\Back;

use Illuminate\Queue\SerializesModels;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\PointsFlowPackage\Actions\Contracts\Events\Back\ModifyItemEventContract;

/**
 * Class ModifyItemEvent.
 */
class ModifyItemEvent implements ModifyItemEventContract
{
    use SerializesModels;

    /**
     * @var ActionModelContract
     */
    public $item;

    /**
     * ModifyItemEvent constructor.
     *
     * @param  ActionModelContract  $item
     */
    public function __construct(ActionModelContract $item)
    {
        $this->item = $item;
    }
}
