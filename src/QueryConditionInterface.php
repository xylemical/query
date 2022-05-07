<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides conditional behaviour to queries.
 */
interface QueryConditionInterface {

  /**
   * QueryConditionInterface constructor.
   *
   * @param string $field
   *   The field.
   * @param string $operation
   *   The operation.
   * @param mixed $value
   *   The value.
   */
  public function __construct(string $field, string $operation, mixed $value);

  /**
   * Get the field.
   *
   * @return string
   *   The field.
   */
  public function getField(): string;

  /**
   * The operation to perform on the path.
   *
   * @return string
   *   The operation.
   */
  public function getOperation(): string;

  /**
   * The value to match against.
   *
   * @return mixed
   *   The value.
   */
  public function getValue(): mixed;

}
