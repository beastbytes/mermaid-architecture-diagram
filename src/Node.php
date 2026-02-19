<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\ArchitectureDiagram;

use BeastBytes\Mermaid\IconTrait;
use BeastBytes\Mermaid\IdTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\TextTrait;

abstract class Node
{
    use IdTrait;

    private const string ICON_TEXT = '(%s)[%s]';
    private const string NODE = '%s%s %s%s%s';
    private const string PARENT = ' in %s';

    protected array $nodes = [];

    public function __construct(
        private readonly string $title,
        private readonly Icon|string $icon,
        ?string $id = null
    )
    {
        $this->id = $id;
    }

    public function render(string $indentation, ?Node $parent = null): string
    {
        $nodes = [sprintf(
            self::NODE,
            $indentation,
            static::NODE_TYPE,
            $this->getId(),
            !($this instanceof Junction)
                ? sprintf(
                    self::ICON_TEXT,
                    ($this->icon instanceof Icon ? $this->icon->name : $this->icon),
                    $this->title,
                )
                : ''
            ,
            $parent instanceof Node ? sprintf(self::PARENT, $parent->getId()) : '',
        )];

        /** @var Node $node */
        foreach ($this->nodes as $node) {
            $nodes[] = $node->render($indentation . Mermaid::INDENTATION, $this);
        }

        return implode("\n", $nodes);
    }
}