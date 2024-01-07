<?php
declare(strict_types=1);

namespace Component\Graph;

class Node
{
    private string $nodeName;

    private ?Node $nextNode;

    public function __construct(string $nodeValue, ?Node $nextNode = null)
    {
        $this->nodeName = $nodeValue;
        $this->nextNode = $nextNode;
    }

    public function getNodeName(): string
    {
        return $this->nodeName;
    }

    public function getNextNode(): ?Node
    {
        return $this->nextNode;
    }

    public function setNextNode(Node $nextNode): void
    {
        $this->nextNode = $nextNode;
    }
}
