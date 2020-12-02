<?php


namespace App\engine;

use App\services\MenuServices;
use App\services\renders\TmplRenderer;
use App\services\UserServices;

/**
 * Class Container
 * @package App\engine
 *
 * @property MenuServices menuService
 * @property UserServices userService
 * @property TmplRenderer renderer
 */
class Container
{
    protected $components = [];
    protected $componentsConfig = [];

    public function __construct($componentsConfig)
    {
        $this->componentsConfig = $componentsConfig;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (!array_key_exists($name, $this->componentsConfig)) {
            throw new \Exception('Компонента нет в конфиге ' . $name);
        }

        $className = $this->componentsConfig[$name]['class'];

        $component = new $className();
        $this->components[$name] = $component;

        return $component;
    }
}