<?php

$filters = parseFilters($_GET['filters']);

header('Content-type: application/json');
exit(json_encode([
  'filters' => $filters,
  'orderBy' => @$_GET['orderBy'],
  'order' => @$_GET['order']
]));

final readonly class Filter {
  function __construct(
    public string $field,
    public string $operator,
    public string $value
  ) {
  }
}

/**
 * @param array{field: string, operator: string, value: string}[] $filters
 * @return Filter[]
 */
function parseFilters(array $filters): array {
  return array_map(
    static fn (array $filter): Filter => new Filter(...$filter),
    $filters
  );
}
