<?php

require_once __DIR__ . '/vendor/autoload.php';

//// Обход "шахматной доски" (как пример различия подоходов стек/очередь)
//$graph = new \Component\Graph\Graph();

//// Создаем шахматную доску
//for ($i = 0; $i < 9; $i++) {
//    for ($j = 0; $j < 9; $j++) {
//        $graph->addNode("$i$j");
//    }
//}
//
//for ($i = 0; $i < 9; $i++) {
//    for ($j = 0; $j < 9; $j++) {
//        for ($di = 0; $di <= 1; $di++) {
//            $dj = 1 - $di;
//
//            if ($i + $di < 9) {
//                if ($j + $dj < 9) {
//                    $ddi = (string) ($i + $di);
//                    $ddj = (string) ($j + $dj);
//                    $graph->addEdge("$i$j",  $ddi . $ddj, 1);
//                }
//            }
//        }
//    }
//}
//
////Помещаем новый созданный граф шахматной достки в Волкер
//$walker = new \Component\Graph\Walker($graph);

////запускаем Волкер либо с инстансом Stack, либо с инстансом Queue. В консоли наблюдаем разный вариант обхода
//$walker->walkDepthByStack('44', new \Component\Graph\Queue());
//------------------------------------------------------------------------

//обход графа
//$graph = new \Component\Graph\Graph();
//
//$graph->addNode("A");
//$graph->addNode("B");
//$graph->addNode("C");
//$graph->addNode("D");
//$graph->addNode("E");
//$graph->addNode("F");
//$graph->addNode("G");
//
//$graph->addEdge("A", "B", 2);
//$graph->addEdge("A", "C", 3);
//$graph->addEdge("A", "D", 6);
//
//$graph->addEdge("B", "C", 4);
//$graph->addEdge("B", "E", 9);
//
//$graph->addEdge("C", "D", 1);
//$graph->addEdge("C", "E", 7);
//$graph->addEdge("C", "F", 6);
//
//$graph->addEdge("D", "F", 4);
//
//$graph->addEdge("E", "F", 1);
//$graph->addEdge("E", "G", 5);
//
//$graph->addEdge("F", "G", 8);
////
////foreach ($graph->getNodes() as $node) {
////    echo $node . "<br>\n";
////}
////
////echo "================================" . "<br>\n";
////
////$firstNodeName = 'A';
////foreach ($graph->getEdges($firstNodeName) as $secondNodeName => $length) {
////    echo $firstNodeName . "-" . $secondNodeName . " " . $length . "<br>\n";
////}
//
//echo "================================" . "<br>\n";
//
//
//Реализация алгоритма Дейкстры на нахождение кртачайшего пути

$graph = new \Component\Graph\Graph();

$graph->addNode("A");
$graph->addNode("B");
$graph->addNode("C");
$graph->addNode("D");
$graph->addNode("E");
$graph->addNode("F");
$graph->addNode("G");

$graph->addEdge("A", "B", 5);
$graph->addEdge("A", "C", 1);
$graph->addEdge("A", "D", 4);

$graph->addEdge("B", "C", 2);
$graph->addEdge("B", "E", 6);

$graph->addEdge("C", "D", 3);
$graph->addEdge("C", "E", 8);
$graph->addEdge("C", "F", 9);

$graph->addEdge("D", "F", 5);

$graph->addEdge("E", "F", 2);
$graph->addEdge("E", "G", 4);

$graph->addEdge("F", "G", 6);

$dijkstra = new \Component\Graph\Dijkstra($graph);
echo $dijkstra->getShortedPath('A', 'G') . "<br>\n";


//$a = findCircleNum();
//
//function findCircleNum()
//{
//    $isConnected = [[1,1,0],[1,1,0],[0,0,1]];
//    $length    = count($isConnected);
//    $visited   = array_fill(0, $length, 0);
//    $provinces = 0;
//
//    for ($i = 0; $i < $length; $i++)
//    {
//        if ($visited[$i] === 0)
//        {
//            dfs($isConnected, $visited, $i, $length);
//            $provinces++;
//        }
//    }
//
//    return $provinces;
//}
//
//function dfs($isConnected, &$visited, $i, $length)
//{
//    $visited[$i] = 1;
//
//    for ($j = 0; $j < $length; $j++)
//    {
//        if ($isConnected[$i][$j] == 1 && $visited[$j] === 0)
//        {
//            dfs($isConnected, $visited, $j, $length);
//        }
//    }
//}
