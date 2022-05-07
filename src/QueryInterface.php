<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides means to query.
 */
interface QueryInterface {

  /**
   * Get the target of the query.
   *
   * @return mixed
   *   The target.
   */
  public function getTarget(): mixed;

  /**
   * Get the query source.
   *
   * @return \Xylemical\Query\QuerySourceInterface
   *   The query source.
   */
  public function getSource(): QuerySourceInterface;

  /**
   * Get the query condition factory.
   *
   * @return \Xylemical\Query\QueryConditionFactoryInterface
   *   The query condition factory.
   */
  public function getConditionFactory(): QueryConditionFactoryInterface;

  /**
   * Get the conditions of the query.
   *
   * @return \Xylemical\Query\QueryConditionInterface[]
   *   The query conditions.
   */
  public function getConditions(): array;

  /**
   * Set the conditions of the query.
   *
   * @param \Xylemical\Query\QueryConditionInterface[] $conditions
   *   The conditions.
   *
   * @return $this
   */
  public function setConditions(array $conditions): static;

  /**
   * Add multiple conditions.
   *
   * @param \Xylemical\Query\QueryConditionInterface[] $conditions
   *   The conditions.
   *
   * @return $this
   */
  public function addConditions(array $conditions): static;

  /**
   * Add a condition.
   *
   * @param \Xylemical\Query\QueryConditionInterface $condition
   *   The condition.
   *
   * @return $this
   */
  public function addCondition(QueryConditionInterface $condition): static;

  /**
   * Shortcut method for adding a condition.
   *
   * @param string $path
   *   The path.
   * @param string $operation
   *   The operation.
   * @param mixed $value
   *   The value.
   *
   * @return $this
   */
  public function condition(string $path, string $operation, mixed $value): static;

  /**
   * Get the query sort factory.
   *
   * @return \Xylemical\Query\QuerySortFactoryInterface
   *   The factory.
   */
  public function getSortFactory(): QuerySortFactoryInterface;

  /**
   * Get the query sorts.
   *
   * @return \Xylemical\Query\QuerySortInterface[]
   *   The query sort conditions.
   */
  public function getSorts(): array;

  /**
   * Set the query sort conditions.
   *
   * @param \Xylemical\Query\QuerySortInterface[] $sorts
   *   The sorts.
   *
   * @return $this
   */
  public function setSorts(array $sorts): static;

  /**
   * Add multiple query sorts.
   *
   * @param \Xylemical\Query\QuerySortInterface[] $sorts
   *   The query sorts.
   *
   * @return $this
   */
  public function addSorts(array $sorts): static;

  /**
   * Add a query sort.
   *
   * @param \Xylemical\Query\QuerySortInterface $sort
   *   The sort.
   *
   * @return $this
   */
  public function addSort(QuerySortInterface $sort): static;

  /**
   * Shortcut method for adding a query sort.
   *
   * @param string $path
   *   The path.
   * @param string $operation
   *   The operation.
   *
   * @return $this
   */
  public function sort(string $path, string $operation): static;

  /**
   * Get the group factory.
   *
   * @return \Xylemical\Query\QueryGroupFactoryInterface
   *   The factory.
   */
  public function getGroupFactory(): QueryGroupFactoryInterface;

  /**
   * Get the query groups.
   *
   * @return \Xylemical\Query\QueryGroupInterface[]
   *   The query group conditions.
   */
  public function getGroups(): array;

  /**
   * Set the query group conditions.
   *
   * @param \Xylemical\Query\QueryGroupInterface[] $groups
   *   The groups.
   *
   * @return $this
   */
  public function setGroups(array $groups): static;

  /**
   * Add multiple query groups.
   *
   * @param \Xylemical\Query\QueryGroupInterface[] $groups
   *   The query groups.
   *
   * @return $this
   */
  public function addGroups(array $groups): static;

  /**
   * Add a query group.
   *
   * @param \Xylemical\Query\QueryGroupInterface $group
   *   The group.
   *
   * @return $this
   */
  public function addGroup(QueryGroupInterface $group): static;

  /**
   * Shortcut method for adding a query group.
   *
   * @param string $path
   *   The path.
   * @param string $operation
   *   The operation.
   *
   * @return $this
   */
  public function group(string $path, string $operation): static;

  /**
   * Get query range factory.
   *
   * @return \Xylemical\Query\QueryRangeFactoryInterface
   *   The factory.
   */
  public function getRangeFactory(): QueryRangeFactoryInterface;

  /**
   * Get the query range.
   *
   * @return \Xylemical\Query\QueryRangeInterface|null
   *   The query range.
   */
  public function getRange(): ?QueryRangeInterface;

  /**
   * Set the query range.
   *
   * @param \Xylemical\Query\QueryRangeInterface|null $range
   *   The range.
   *
   * @return $this
   */
  public function setRange(?QueryRangeInterface $range): static;

  /**
   * Set a range for the query.
   *
   * @param int $offset
   *   The offset.
   * @param int|null $count
   *   The number of items to return.
   *
   * @return $this
   */
  public function range(int $offset, ?int $count): static;

  /**
   * Provides the results of the query.
   *
   * @return \Generator
   *   The generator.
   */
  public function execute(): \Generator;

}
