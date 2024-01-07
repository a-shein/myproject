<?php
declare(strict_types=1);

namespace Component\Graph;

class Stack implements SequenceInterface
{
    private ?Node $lastNode;

    public function __construct()
    {
        $this->lastNode = null;
    }

    public function put(string $value): void
    {
        $this->lastNode = new Node($value, $this->lastNode);
    }

    public function get(): ?string
    {
        if ($this->isEmpty()) {
            return null;
        }

        $lastNodeValue = $this->lastNode->getNodeName();

        $this->lastNode = $this->lastNode->getNextNode();

        return $lastNodeValue;
    }

    public function isEmpty(): bool
    {
        return $this->lastNode === null;
    }

    public function getList(): iterable
    {
        $currentNode = $this->lastNode;

        while ($currentNode !== null) {
            yield $currentNode->getNodeName();
            $currentNode = $currentNode->getNextNode();
        }
    }

    public function contains(string $nodeName): bool
    {
        /** @var Node $node */
        foreach ($this->getList() as $node) {
            if ($node === $nodeName) {
                return true;
            }
        }

        return false;
    }
}
