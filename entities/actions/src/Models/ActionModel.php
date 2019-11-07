<?php

namespace InetStudio\PointsFlowPackage\Actions\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use InetStudio\Classifiers\Models\Traits\HasClassifiers;
use Illuminate\Contracts\Container\BindingResolutionException;
use InetStudio\PointsFlowPackage\Actions\Contracts\Models\ActionModelContract;
use InetStudio\AdminPanel\Base\Models\Traits\Scopes\BuildQueryScopeTrait;

/**
 * Class ActionModel.
 */
class ActionModel extends Model implements ActionModelContract
{
    use Auditable;
    use SoftDeletes;
    use HasClassifiers;
    use BuildQueryScopeTrait;

    /**
     * Тип сущности.
     */
    const ENTITY_TYPE = 'points_flow_action';

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
    protected $table = 'points_flow_actions';

    /**
     * Атрибуты, для которых разрешено массовое назначение.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'description',
        'points',
        'single',
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
            'name',
            'alias',
            'points',
            'single',
        ];
    }

    /**
     * Сеттер атрибута name.
     *
     * @param $value
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута alias.
     *
     * @param $value
     */
    public function setAliasAttribute($value): void
    {
        $this->attributes['alias'] = trim(strip_tags($value));
    }

    /**
     * Сеттер атрибута description.
     *
     * @param $value
     */
    public function setDescriptionAttribute($value): void
    {
        $value = (isset($value['text'])) ? $value['text'] : (! is_array($value) ? $value : '');

        $this->attributes['description'] = trim(str_replace('&nbsp;', ' ', strip_tags($value)));
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
     * Сеттер атрибута single.
     *
     * @param $value
     */
    public function setSingleAttribute($value): void
    {
        $value = $value[0] ?? (is_array($value) ? '' : $value);

        $this->attributes['single'] = (bool) trim(strip_tags($value));
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

    /**
     * Отношение "один ко многим" с моделью записей.
     *
     * @return HasMany
     *
     * @throws BindingResolutionException
     */
    public function records(): HasMany
    {
        $recordModel = app()->make('InetStudio\PointsFlowPackage\Records\Contracts\Models\RecordModelContract');

        return $this->hasMany(
            get_class($recordModel),
            'action_id'
        );
    }
}
