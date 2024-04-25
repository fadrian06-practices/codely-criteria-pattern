<?php

namespace FasLatam\Contexts\Shared\Infrastructure\Criteria;

use FasLatam\Contexts\Shared\Domain\Criteria\FilterPrimitives;

final readonly class SearchParamsCriteriaFiltersParser {
  /**
   * @param array{field: string, operator: string, value: string}[] $filters
   * @return FilterPrimitives[]
   */
  static function parse(array $filters): array {
    return array_map(
      static fn (array $filter): FilterPrimitives => new FilterPrimitives(...$filter),
      $filters
    );
  }
}
