<?php
declare(strict_types=1);

namespace Component\Graph;

class Walker
{
    private Graph $graph;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function walkDepth(string $nodeName, Stack|Queue $sequence): array
    {
        $path = [];

        $sequence->put($nodeName);

        $this->show($path, $sequence);

        while (!$sequence->isEmpty()) {
            $current = $sequence->get();

            $path[$current] = true;

            foreach ($this->graph->getEdges($current) as $nextNodeName => $length) {
                if (!array_key_exists((string)$nextNodeName, $path)) {
                    if (!$sequence->contains((string)$nextNodeName)) {
                        $sequence->put((string)$nextNodeName);
                    }
                }
            }

            $this->show($path, $sequence);
        }

        return $path;
    }

    private function show(array $path, Stack|Queue $sequence): void
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (array_key_exists("$i$j", $path)) {
                    echo "$i$j ";
                } elseif ($sequence->contains("$i$j")) {
                    echo "++ ";
                } else {
                    echo ".. ";
                }
            }

            echo " <br>\n";
        }

        foreach ($sequence->getList() as $node) {
            echo $node . " ";
        }

        echo "<br>\n";

        readline();
    }
}
