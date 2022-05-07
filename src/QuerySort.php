<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * A generic query sort.
 */
class QuerySort implements QuerySortInterface {

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
   * {@inheritdoc}
   */
  public function __construct(string $field, string $operation) {
    $this->field = $field;
    $this->operation = strtoupper($operation);
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

}
