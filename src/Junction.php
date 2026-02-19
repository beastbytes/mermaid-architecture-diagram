<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

final class Junction extends Node
{
    protected const string NODE_TYPE = 'junction';

    public function __construct(?string $id = null)
    {
        parent::__construct('', '', $id);
    }
}