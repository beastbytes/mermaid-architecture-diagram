<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

final class Group extends Node
{
    protected const string NODE_TYPE = 'group';

    public function addNode(Group|Junction|Service ...$node): self
    {
        $new = clone $this;
        $new->nodes = array_merge($this->nodes, $node);
        return $new;
    }

    public function withNode(Group|Junction|Service ...$node): self
    {
        $new = clone $this;
        $new->nodes = $node;
        return $new;
    }
}