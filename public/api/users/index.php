<?php

use FasLatam\Contexts\Shared\Domain\Criteria\Criteria;
use FasLatam\Contexts\Shared\Infrastructure\Criteria\SearchParamsCriteriaFiltersParser;

require __DIR__ . '/../../../vendor/autoload.php';

$filters = SearchParamsCriteriaFiltersParser::parse($_GET['filters']);

$criteria = Criteria::fromPrimitives(@$_GET['orderBy'], @$_GET['order'], ...$filters);

file_put_contents('php://stdout', print_r($criteria, true));

header('Content-type: application/json');
exit(json_encode([
  'filters' => $filters,
  'orderBy' => @$_GET['orderBy'],
  'order' => @$_GET['order']
]));
