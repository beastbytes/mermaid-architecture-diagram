<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\Diagram;
use BeastBytes\Mermaid\RenderItemsTrait;

class ArchitectureDiagram extends Diagram
{
    use CommentTrait;
    use RenderItemsTrait;

    private const string TYPE = 'architecture-beta';

    /** @var list<Edge> */
    private array $edges = [];
    /** @var list<Group|Junction|Service> */
    private array $nodes = [];

    public function addEdge(Edge ...$edge): self
    {
        $new = clone $this;
        $new->edges = array_merge($this->edges, $edge);
        return $new;
    }

    public function addNode(Group|Junction|Service ...$node): self
    {
        $new = clone $this;
        $new->nodes = array_merge($this->nodes, $node);
        return $new;
    }

    public function withEdge(Edge ...$edge): self
    {
        $new = clone $this;
        $new->edges = $edge;
        return $new;
    }

    public function withNode(Group|Junction|Service ...$node): self
    {
        $new = clone $this;
        $new->nodes = $node;
        return $new;
    }

    protected function renderDiagram(): string
    {
        $output = [];

        $output[] = $this->renderComment('');
        $output[] = self::TYPE;
        $output[] = $this->renderItems($this->nodes, '');
        $output[] = $this->renderItems($this->edges, '');

        return implode("\n", array_filter($output, fn($v) => !empty($v)));
    }
}