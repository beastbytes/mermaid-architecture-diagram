<?php

use BeastBytes\Mermaid\ArchitectureDiagram\ArchitectureDiagram;
use BeastBytes\Mermaid\ArchitectureDiagram\Direction;
use BeastBytes\Mermaid\ArchitectureDiagram\Edge;
use BeastBytes\Mermaid\ArchitectureDiagram\Group;
use BeastBytes\Mermaid\ArchitectureDiagram\Icon;
use BeastBytes\Mermaid\ArchitectureDiagram\Junction;
use BeastBytes\Mermaid\ArchitectureDiagram\Service;
use BeastBytes\Mermaid\Mermaid;

test('Architecture Diagram', function () {
    $leftDisk = new Service('Disk', Icon::disk, 'left_disk');
    $topDisk = new Service('Disk', Icon::disk, 'top_disk');
    $bottomDisk = new Service('Disk', Icon::disk, 'bottom_disk');
    $topGateway = new Service('Gateway', Icon::internet, 'top_gateway');
    $bottomGateway = new Service('Gateway', Icon::internet, 'bottom_gateway');

    $junctionCenter = new Junction('junctionCenter');
    $junctionRight = new Junction('junctionRight');

    expect(Mermaid::create(ArchitectureDiagram::class)
        ->withNode(
            (new Group('Disks', Icon::disk, 'disks'))
                ->withNode($leftDisk, $topDisk, $bottomDisk)
            ,
            $topGateway,
            $bottomGateway
        )
        ->addNode($junctionCenter, $junctionRight)
        ->withEdge(
            (new Edge())
                ->withFrom($leftDisk, Direction::right, Edge::GROUP)
                ->withTo($junctionCenter, Direction::left)
            ,
            (new Edge())
                ->withFrom($topDisk, Direction::bottom, Edge::GROUP)
                ->withTo($junctionCenter, Direction::top)
            ,
            (new Edge())
                ->withFrom($bottomDisk, Direction::top, Edge::GROUP)
                ->withTo($junctionCenter, Direction::bottom)
        )
        ->addEdge(
            (new Edge())
                ->withFrom($junctionCenter, Direction::right)
                ->withTo($junctionRight, Direction::left)
            ,
            (new Edge())
                ->withFrom($topGateway, Direction::bottom)
                ->withTo($junctionRight, Direction::top)
            ,
            (new Edge())
                ->withFrom($bottomGateway, Direction::top)
                ->withTo($junctionRight, Direction::bottom)
            ,
        )
        ->render()
    )
        ->toBe(<<<Expected
<pre class="mermaid">
architecture-beta
  group disks(disk)[Disks]
    service left_disk(disk)[Disk] in disks
    service top_disk(disk)[Disk] in disks
    service bottom_disk(disk)[Disk] in disks
  service top_gateway(internet)[Gateway]
  service bottom_gateway(internet)[Gateway]
  junction junctionCenter
  junction junctionRight
  left_disk{group}:R -- L:junctionCenter
  top_disk{group}:B -- T:junctionCenter
  bottom_disk{group}:T -- B:junctionCenter
  junctionCenter:R -- L:junctionRight
  top_gateway:B -- T:junctionRight
  bottom_gateway:T -- B:junctionRight
</pre>
Expected
        )
    ;
});