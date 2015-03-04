<?php

namespace TccSkippableSegment;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function getConfig()
    {
        return [
            'route_manager' => [
                'invokables' => [
                    'SkippableSegment' => 'TccSkippableSegment\Mvc\Router\Http\SkippableSegment',
                ],
            ],
        ];
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }
}
