<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

enum Arrow: string
{
    case both = '<-->';
    case left = '<--';
    case none = '--';
    case right = '-->';
}