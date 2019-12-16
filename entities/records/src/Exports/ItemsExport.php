<?php

namespace InetStudio\PointsFlowPackage\Records\Exports;

use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PointsFlowPackage\Records\Contracts\Exports\ItemsExportContract;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class ItemsExport.
 */
class ItemsExport implements ItemsExportContract, FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    /**
     * @var string
     */
    protected $data = [];

    /**
     * Data property setter.
     *
     * @param  array  $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return Builder
     *
     * @throws BindingResolutionException
     */
    public function query()
    {
        $itemsService = app()->make('InetStudio\PointsFlowPackage\Records\Contracts\Services\Back\ItemsServiceContract');

        return $itemsService->getModel()->buildQuery(
            [
                'columns' => ['created_at'],
                'relations' => ['user', 'action'],
            ]
        );
    }

    /**
     * @param $item
     *
     * @return array
     */
    public function map($item): array
    {
        return [
            $item->id,
            $item->user->name,
            $item->action->name,
            $item->points,
            Date::dateTimeToExcel($item->created_at),
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Пользователь',
            'Действие',
            'Баллы',
            'Дата действия',
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'E' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }
}
