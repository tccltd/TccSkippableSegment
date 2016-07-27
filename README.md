TccSkippableSegment
=======

This ZF3 module is based on the work by: @towr (https://gist.github.com/towr/3320fb4ee13dfd079890).

It allows you to specify segments of routes which can be skipped:

e.g. [/:lang]/my-page/anotherpage

The lang parameter may be omitted if there is no value for it or if its the default value (as defined in "defaults").

Usage
-----
SkippableSegment route.

Modified Segment route where you can skip optional segments.

```php
'router' => [
    'routes' => [
        'home' => [
            'type' => 'SkippableSegment',
            'options' => [
                'route' => '[/:lang]',
                'constraints' => [
                    'lang' => '(?i:en|us)',
                ],
                'defaults' => [
                    'lang'       => '',
                    'controller' => 'MyController',
                    'action'     => 'index'
                ],
                'skippable' => [
                    'lang' => true,
                ],
            ],
            'may_terminate' => true,
            'child_routes' => [
                'my-page' => [
                    'type' => 'Segment',
                    ...
                    ...
                ],
            ],
        ],
    ],
);
```
