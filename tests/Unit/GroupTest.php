<?php

use BeastBytes\Mermaid\ArchitectureDiagram\Group;
use BeastBytes\Mermaid\ArchitectureDiagram\Icon;
use BeastBytes\Mermaid\Mermaid;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});


test('Group', function () {
    expect((new Group('Group', Icon::cloud))
        ->render('')
    )
        ->toBe('group mrmd0(cloud)[Group]')
    ;
});

test('Group with Id', function () {
    expect((new Group('Group', Icon::cloud, 'group0'))
        ->render('')
    )
        ->toBe('group group0(cloud)[Group]')
    ;
});

test('Child Group', function () {
    expect((new Group('Group', Icon::cloud, 'group0'))
        ->withNode(new Group('Child Group', Icon::database, 'group1'))
        ->render('')
    )
        ->toBe(<<<EXPECTED
group group0(cloud)[Group]
  group group1(database)[Child Group] in group0
EXPECTED
        )
    ;
});