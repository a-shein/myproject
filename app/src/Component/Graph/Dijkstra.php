<?php
declare(strict_types=1);

namespace Component\Graph;

class Dijkstra
{
    private const INFINITY = 1e9;

    private Graph $graph;

    private array $visited = [];

    private array $pathSum = [];

    private array $path = [];

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function getShortedPath(string $fromNodeName, string $toNodeName): string
    {
        $this->init();

        $this->pathSum[$fromNodeName] = 0;

        while ($currentNodeName = $this->findNearestNotVisitedNodeName()) {
            $this->setPathSumToNextNodes($currentNodeName);
        }

        return $this->restorePath($fromNodeName, $toNodeName);
    }

    private function init(): void
    {
        foreach ($this->graph->getNodes() as $nodeName) {
            $this->visited[$nodeName] = false;
            $this->pathSum[$nodeName] = self::INFINITY;
            $this->path[$nodeName] = '';
        }
    }

    private function findNearestNotVisitedNodeName(): string
    {
        $nearestNodeName = '';

        foreach ($this->graph->getNodes() as $nodeName) {
            if (!$this->visited[$nodeName]) {
                if ($nearestNodeName === '' || $this->pathSum[$nodeName] < $this->pathSum[$nearestNodeName]) {
                    $nearestNodeName = $nodeName;
                }
            }
        }

        return $nearestNodeName;
    }

    private function setPathSumToNextNodes(string $currentNodeName): void
    {
        $this->visited[$currentNodeName] = true;

        foreach ($this->graph->getEdges($currentNodeName) as $nextNodeName => $length) {
            if (!$this->visited[$nextNodeName]) {

                $newPathSum = $this->pathSum[$currentNodeName] + $length;

                if ($newPathSum < $this->pathSum[$nextNodeName]) {
                    $this->pathSum[$nextNodeName] = $newPathSum;
                    $this->path[$nextNodeName] = $currentNodeName;
                }
            }
        }
    }

    private function restorePath(string $fromNodeName, string $toNodeName): string
    {
        $path = $toNodeName;

        while ($toNodeName !== $fromNodeName) {
            $toNodeName = $this->path[$toNodeName];
            $path = $toNodeName . $path;
        }

        return $path;
    }
}
