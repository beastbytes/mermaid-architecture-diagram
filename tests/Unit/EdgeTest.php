<?php

use BeastBytes\Mermaid\ArchitectureDiagram\Arrow;
use BeastBytes\Mermaid\ArchitectureDiagram\Direction;
use BeastBytes\Mermaid\ArchitectureDiagram\Edge;
use BeastBytes\Mermaid\ArchitectureDiagram\Icon;
use BeastBytes\Mermaid\ArchitectureDiagram\Service;

$lService = new Service('Left Service', Icon::server, 'ls');
$rService = new Service('Right Service', Icon::internet, 'rs');

test('Edge', function (
    Service $lService,
    Direction $lDirection,
    bool $lGroup,
    Service $rService,
    Direction $rDirection,
    bool $rGroup,
    Arrow $arrow,
    string $expected
) {
    expect((new Edge())
        ->withFrom($lService, $lDirection, $lGroup)
        ->withTo($rService, $rDirection, $rGroup)
        ->withArrow($arrow)
        ->render('')
    )
        ->toBe($expected)
    ;
})
    ->with('edges')
;

test('exception', function () use ($lService) {
    expect(fn() => (new Edge())
        ->render('')
    )
        ->toThrow(RuntimeException::class, Edge::EXCEPTION)
        ->and(fn() => (new Edge())
            ->withFrom($lService, Direction::top)
            ->render('')
        )
        ->toThrow(RuntimeException::class, Edge::EXCEPTION)
        ->and(fn() => (new Edge())
            ->withTo($lService, Direction::top)
            ->render('')
        )
        ->toThrow(RuntimeException::class, Edge::EXCEPTION)
    ;

});

dataset('edges', [
    [
        $lService,
        Direction::right,
        false,
        $rService,
        Direction::left,
        false,
        Arrow::none,
        'ls:R -- L:rs'
    ],
    [
        $lService,
        Direction::top,
        true,
        $rService,
        Direction::bottom,
        true,
        Arrow::both,
        'ls{group}:T <--> B:rs{group}'
    ],
]);