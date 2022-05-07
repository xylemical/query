<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides functionality for grouping query items.
 */
interface QueryGroupInterface {

  /**
   * QueryGroupInterface constructor.
   *
   * @param string $field
   *   The field.
   * @param string $operation
   *   The operation.
   */
  public function __construct(string $field, string $operation);

  /**
   * Get the field.
   *
   * @return string
   *   The field.
   */
  public function getField(): string;

  /**
   * Get the grouping operation.
   *
   * @return string
   *   The operation.
   */
  public function getOperation(): string;

}
