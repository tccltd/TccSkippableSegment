<?php

namespace TccSkippableSegment;

use TccSkippableSegment\Mvc\Router\Http\SkippableSegment;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function getConfig()
    {
        if (class_exists('\Zend\Mvc\Router\RouteInvokableFactory')) {
            // new version for zend-mvc >= 2.7
            $route_manager = [
                'aliases' => [
                    'SkippableSegment' => SkippableSegment::class,
                ],
                'factories' => [
                    SkippableSegment::class => \Zend\Mvc\Router\RouteInvokableFactory::class,
                ]
            ];
        } else {
            // old zend-mvc version
            $route_manager = [
                'invokables' => [
                    'SkippableSegment' => SkippableSegment::class,
                ],
            ];
        }
        return [
            'route_manager' => $route_manager
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
