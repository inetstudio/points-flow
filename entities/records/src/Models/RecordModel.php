<?php

namespace InetStudio\PointsFlowPackage\Records\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use InetStudio\ACL\Users\Models\Traits\HasUser;
use InetStudio\AdminPanel\Models\Traits\HasJSONColumns;
use InetStudio\PointsFlowPackage\Actions\Models\Traits\Action;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;
use InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract;

/**
 * Class RecordModel.
 */
class RecordModel extends Model implements RecordModelContract
{
    use Auditable;
    use SoftDeletes;
    use HasJSONColumns;
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
        'additional_info'
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
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'additional_info' => 'array',
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
            'additional_info',
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
     * Сеттер атрибута additional_info.
     *
     * @param $value
     */
    public function setAdditionalInfoAttribute($value)
    {
        $this->attributes['additional_info'] = json_encode((array) $value);
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
