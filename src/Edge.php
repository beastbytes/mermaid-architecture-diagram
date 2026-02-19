<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

use RuntimeException;

final class Edge
{
    public const string EXCEPTION = 'The `from` and `to` nodes must be specified using the `withFrom()` and `withTo()` methods';
    public const bool GROUP = true;
    private const string EDGE = '%s%s:%s %s %s:%s%s';
    private const string GROUP_MODIFIER = '{group}';

    private Arrow $arrow = Arrow::none;

    /**
     * @var array{node: Junction|Service, group: bool, direction: Direction}|null $services
     */
    private ?array $from = null;

    /**
     * @var array{node: Junction|Service, group: bool, direction: Direction}|null $services
     */
    private ?array $to = null;

    public function withArrow(Arrow $arrow): self
    {
        $new = clone $this;
        $new->arrow = $arrow;
        return $new;
    }

    public function withFrom(Junction|Service $node, Direction $direction, bool $group = !self::GROUP): self
    {
        $new = clone $this;
        $new->from = compact('node', 'direction', 'group');
        return $new;
    }

    public function withTo(Junction|Service $node, Direction $direction, bool $group = !self::GROUP): self
    {
        $new = clone $this;
        $new->to = compact('node', 'direction', 'group');
        return $new;
    }

    public function render(string $indentation): string
    {
        if ($this->from === null || $this->to === null) {
            throw new RuntimeException(self::EXCEPTION);
        }

        return $indentation
            . sprintf(
                self::EDGE,
                $this->from['node']->getId(),
                $this->from['group'] ? self::GROUP_MODIFIER : '',
                $this->from['direction']->value,
                $this->arrow->value,
                $this->to['direction']->value,
                $this->to['node']->getId(),
                $this->to['group'] ? self::GROUP_MODIFIER : '',
            )
        ;
    }
}