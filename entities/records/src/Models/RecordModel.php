<?php

namespace InetStudio\PointsFlowPackage\Records\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\ACL\Users\Models\Traits\HasUser;
use InetStudio\PointsFlowPackage\Actions\Models\Traits\Action;
use InetStudio\Classifiers\Models\Traits\HasClassifiers;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class RecordModel.
 */
class RecordModel extends Model implements RecordModelContract
{
    use Auditable;
    use SoftDeletes;
    use HasClassifiers;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'points_flow_record';

    /**
     * Should the timestamps be audited?
     *
     * @var bool
     */
    protected $auditTimestamps = true;

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'points_flow_records';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'action_id',
        'points',
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Загрузка модели.
     */
    protected static function boot()
    {
        parent::boot();

        self::$buildQueryScopeDefaults['columns'] = [
            'id',
            'user_id',
            'action_id',
            'points',
        ];

        self::$buildQueryScopeDefaults['relations'] = [
            'user' => function ($query) {
                $query->select(['id', 'name', 'email']);
            },
            'action' => function ($query) {
                $query->select(['id', 'name', 'alias']);
            },
        ];
    }

    /**
     * Сеттер атрибута user_id.
     *
     * @param $value
     */
    public function setUserIdAttribute($value): void
    {
        $this->attributes['user_id'] = (int) trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута action_id.
     *
     * @param $value
     */
    public function setActionIdAttribute($value): void
    {
        $this->attributes['action_id'] = (int) trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута points.
     *
     * @param $value
     */
    public function setPointsAttribute($value): void
    {
        $this->attributes['points'] = (int) trim(strip_tags($value));
    }

    /**
     * Геттер атрибута type.
     *
     * @return string
     */
    public function getTypeAttribute(): string
    {
        return self::ENTITY_TYPE;
    }

    use Action;
    use HasUser;
}
