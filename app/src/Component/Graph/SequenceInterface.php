<?php

namespace Component\Graph;

interface SequenceInterface
{
    public function put(string $value): void;

    public function get(): ?string;

    public function isEmpty(): bool;

    public function getList(): iterable;

    public function contains(string $nodeName): bool;
}
