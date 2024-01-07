<?php
declare(strict_types=1);

namespace Component\Graph;

class Graph
{
    private array $edges;

    public function __construct()
    {
        $this->edges = [];
    }

    public function addNode(string $nodeName): void
    {
        $this->edges[$nodeName] = [];
    }

    public function addEdge(string $firstNodeName, string $secondNodeName, int $length): void
    {
        $this->edges[$firstNodeName][$secondNodeName] = $length;
        $this->edges[$secondNodeName][$firstNodeName] = $length;
    }

    public function getNodes(): iterable
    {
        foreach ($this->edges as $node => $edge) {
            yield $node;
        }
    }

    public function getEdges(string $firstNodeName): iterable
    {
        foreach ($this->edges[$firstNodeName] as $secondNodeName => $length) {
            yield $secondNodeName => $length;
        }
    }
}
