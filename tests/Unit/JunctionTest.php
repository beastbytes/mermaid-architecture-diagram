<?php

use BeastBytes\Mermaid\ArchitectureDiagram\Group;
use BeastBytes\Mermaid\ArchitectureDiagram\Icon;
use BeastBytes\Mermaid\ArchitectureDiagram\Junction;
use BeastBytes\Mermaid\Mermaid;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Junction', function () {
    expect((new Junction())
        ->render('')
    )
        ->toBe('junction mrmd0')
    ;
});

test('Junction with Id', function () {
    expect((new Junction('junction0'))
        ->render('')
    )
        ->toBe('junction junction0')
    ;
});

test('Junction in Group', function () {
    expect((new Group('Group', Icon::cloud, 'group0'))
        ->withNode(new Junction('junction0'))
        ->render('')
    )
        ->toBe(<<<EXPECTED
group group0(cloud)[Group]
  junction junction0 in group0
EXPECTED
        )
    ;
});