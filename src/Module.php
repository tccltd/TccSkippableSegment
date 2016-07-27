<?php

namespace TccSkippableSegment;

use TccSkippableSegment\Router\Http\SkippableSegment;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Router\RouteInvokableFactory;

/**
 * Class Module
 * @package TccSkippableSegment
 */
class Module implements ConfigProviderInterface
{
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return [
            'route_manager' => [
                'aliases' => [
                    'SkippableSegment' => SkippableSegment::class,
                ],
                'factories' => [
                    SkippableSegment::class => RouteInvokableFactory::class,
                ],
            ],
        ];
    }
}
