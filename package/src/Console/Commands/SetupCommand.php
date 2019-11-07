<?php

namespace InetStudio\PointsFlowPackage\Console\Commands;

use InetStudio\AdminPanel\Base\Console\Commands\BaseSetupCommand;

/**
 * Class SetupCommand.
 */
class SetupCommand extends BaseSetupCommand
{
    /**
     * Имя команды.
     *
     * @var string
     */
    protected $name = 'inetstudio:points-flow-package:setup';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Setup points flow package';

    /**
     * Инициализация команд.
     */
    protected function initCommands(): void
    {
        $this->calls = [
            [
                'type' => 'artisan',
                'description' => 'Points flow actions setup',
                'command' => 'inetstudio:points-flow-package:actions:setup',
            ],
            [
                'type' => 'artisan',
                'description' => 'Points flow records setup',
                'command' => 'inetstudio:points-flow-package:records:setup',
            ],
        ];
    }
}
