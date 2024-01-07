<?php
declare(strict_types=1);

namespace Component\Graph;

class Queue implements SequenceInterface
{
    private ?Node $head;

    private ?Node $last;

    public function __construct()
    {
        $this->head = null;
        $this->last = null;
    }

    public function put(string $value): void
    {
        $queuedNode = new Node($value);

        if ($this->isEmpty()) {
            $this->head = $queuedNode;
        } else {
            $this->last->setNextNode($queuedNode);
        }
        $this->last = $queuedNode;
    }

    public function get(): ?string
    {
        if ($this->isEmpty()) {
            return null;
        }

        $headValue = $this->head->getNodeName();

        $this->head = $this->head->getNextNode();

        return $headValue;
    }

    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    public function getList(): iterable
    {
        $currentNode = $this->head;

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
