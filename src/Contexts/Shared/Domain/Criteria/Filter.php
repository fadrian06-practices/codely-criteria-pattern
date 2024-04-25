<?php

namespace FasLatam\Contexts\Shared\Domain\Criteria;

final readonly class Filter {
  function __construct(
    public FilterField $field,
    public FilterOperator $operator,
    public FilterValue $value
  ) {
  }

  static function fromPrimitives(
    string $field,
    string $operator,
    string $value
  ): self {
    return new Filter(
      new FilterField($field),
      new FilterOperator(Operator::fromName($operator)),
      new FilterValue($value)
    );
  }
}
