<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query condition.
 */
class QueryCondition implements QueryConditionInterface {

  /**
   * The field.
   *
   * @var string
   */
  protected string $field;

  /**
   * The operation.
   *
   * @var string
   */
  protected string $operation;

  /**
   * The value.
   *
   * @var mixed
   */
  protected mixed $value;

  /**
   * {@inheritdoc}
   */
  public function __construct(string $field, string $operation, mixed $value) {
    $this->operation = strtoupper($operation);
    $this->field = $field;
    $this->value = $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getField(): string {
    return $this->field;
  }

  /**
   * {@inheritdoc}
   */
  public function getOperation(): string {
    return $this->operation;
  }

  /**
   * {@inheritdoc}
   */
  public function getValue(): mixed {
    return $this->value;
  }

}
