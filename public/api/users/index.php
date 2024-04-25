<?php

use FasLatam\Contexts\Shared\Domain\Criteria\Criteria;
use FasLatam\Contexts\Shared\Domain\Criteria\Filter;
use FasLatam\Contexts\Shared\Domain\Criteria\FilterField;
use FasLatam\Contexts\Shared\Domain\Criteria\FilterOperator;
use FasLatam\Contexts\Shared\Domain\Criteria\Filters;
use FasLatam\Contexts\Shared\Domain\Criteria\FilterValue;
use FasLatam\Contexts\Shared\Domain\Criteria\Operator;
use FasLatam\Contexts\Shared\Domain\Criteria\Order;
use FasLatam\Contexts\Shared\Domain\Criteria\OrderBy;
use FasLatam\Contexts\Shared\Domain\Criteria\OrderType;
use FasLatam\Contexts\Shared\Domain\Criteria\OrderTypes;

require __DIR__ . '/../../../vendor/autoload.php';

$filters = parseFilters($_GET['filters']);

$criteria = new Criteria(
  new Filters(...array_map(fn (QueryFilter $filter): Filter => new Filter(
    new FilterField($filter->field),
    new FilterOperator(Operator::fromName($filter->operator)),
    new FilterValue($filter->value)
  ), $filters)),
  !key_exists('orderBy', $_GET) ? Order::none() : new Order(
    new OrderBy($_GET['orderBy']),
    new OrderType(OrderTypes::fromName($_GET['order']))
  )
);

file_put_contents('php://stdout', print_r($criteria, true));

header('Content-type: application/json');
exit(json_encode([
  'filters' => $filters,
  'orderBy' => @$_GET['orderBy'],
  'order' => @$_GET['order']
]));

final readonly class QueryFilter {
  function __construct(
    public string $field,
    public string $operator,
    public string $value
  ) {
  }
}

/**
 * @param array{field: string, operator: string, value: string}[] $filters
 * @return QueryFilter[]
 */
function parseFilters(array $filters): array {
  return array_map(
    static fn (array $filter): QueryFilter => new QueryFilter(...$filter),
    $filters
  );
}
