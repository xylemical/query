<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides functionality for query fields.
 */
interface QueryFieldInterface {

  /**
   * QueryFieldInterface constructor.
   *
   * @param string $field
   *   The field.
   * @param string $grouping
   *   The grouping operation.
   */
  public function __construct(string $field, string $grouping = '');

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
  public function getGrouping(): string;

}
