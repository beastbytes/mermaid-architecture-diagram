<?php

use BeastBytes\Mermaid\ArchitectureDiagram\Group;
use BeastBytes\Mermaid\ArchitectureDiagram\Icon;
use BeastBytes\Mermaid\ArchitectureDiagram\Service;
use BeastBytes\Mermaid\Mermaid;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Service', function () {
    expect((new Service('Service', Icon::server))
        ->render('')
    )
        ->toBe('service mrmd0(server)[Service]')
    ;
});

test('Service with Id', function () {
    expect((new Service('Service', Icon::database, 'service0'))
        ->render('')
    )
        ->toBe('service service0(database)[Service]')
    ;
});

test('Service in Group', function () {
    expect((new Group('Group', Icon::cloud, 'group0'))
        ->withNode(new Service('Service', Icon::database, 'service0'))
        ->render('')
    )
        ->toBe(<<<EXPECTED
group group0(cloud)[Group]
  service service0(database)[Service] in group0
EXPECTED
        )
    ;
});