<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

enum Direction: string
{
    case bottom = 'B';
    case left = 'L';
    case right = 'R';
    case top = 'T';
}