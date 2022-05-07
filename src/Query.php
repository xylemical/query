<?php

declare(strict_types=1);

namespace Xylemical\Query;

/**
 * Provides a generic query.
 */
class Query implements QueryInterface {

  /**
   * Get the query source.
   *
   * @var \Xylemical\Query\QuerySourceInterface
   */
  protected QuerySourceInterface $source;

  /**
   * The query target.
   *
   * @var mixed
   */
  protected mixed $target;

  /**
   * The condition factory.
   *
   * @var \Xylemical\Query\QueryConditionFactoryInterface
   */
  protected QueryConditionFactoryInterface $conditionFactory;

  /**
   * The sort factory.
   *
   * @var \Xylemical\Query\QuerySortFactoryInterface
   */
  protected QuerySortFactoryInterface $sortFactory;

  /**
   * The group factory.
   *
   * @var \Xylemical\Query\QueryGroupFactoryInterface
   */
  protected QueryGroupFactoryInterface $groupFactory;

  /**
   * The range factory.
   *
   * @var \Xylemical\Query\QueryRangeFactoryInterface
   */
  protected QueryRangeFactoryInterface $rangeFactory;

  /**
   * The conditions.
   *
   * @var \Xylemical\Query\QueryConditionInterface[]
   */
  protected array $conditions = [];

  /**
   * The sort conditions.
   *
   * @var \Xylemical\Query\QuerySortInterface[]
   */
  protected array $sorts = [];

  /**
   * The group conditions.
   *
   * @var \Xylemical\Query\QueryGroupInterface[]
   */
  protected array $groups = [];

  /**
   * The offset.
   *
   * @var \Xylemical\Query\QueryRangeInterface|null
   */
  protected ?QueryRangeInterface $range = NULL;

  /**
   * Query constructor.
   *
   * @param \Xylemical\Query\QuerySourceInterface $source
   *   The query source.
   * @param mixed $target
   *   The target of the query.
   * @param \Xylemical\Query\QueryConditionFactoryInterface $conditionFactory
   *   The condition factory.
   * @param \Xylemical\Query\QuerySortFactoryInterface $sortFactory
   *   The sort factory.
   * @param \Xylemical\Query\QueryGroupFactoryInterface $groupFactory
   *   The group factory.
   * @param \Xylemical\Query\QueryRangeFactoryInterface $rangeFactory
   *   The range factory.
   */
  public function __construct(QuerySourceInterface $source, mixed $target, QueryConditionFactoryInterface $conditionFactory, QuerySortFactoryInterface $sortFactory, QueryGroupFactoryInterface $groupFactory, QueryRangeFactoryInterface $rangeFactory) {
    $this->source = $source;
    $this->target = $target;
    $this->conditionFactory = $conditionFactory;
    $this->sortFactory = $sortFactory;
    $this->groupFactory = $groupFactory;
    $this->rangeFactory = $rangeFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getTarget(): mixed {
    return $this->target;
  }

  /**
   * {@inheritdoc}
   */
  public function getSource(): QuerySourceInterface {
    return $this->source;
  }

  /**
   * {@inheritdoc}
   */
  public function getConditionFactory(): QueryConditionFactoryInterface {
    return $this->conditionFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getConditions(): array {
    return $this->conditions;
  }

  /**
   * {@inheritdoc}
   */
  public function setConditions(array $conditions): static {
    $this->conditions = [];
    return $this->addConditions($conditions);
  }

  /**
   * {@inheritdoc}
   */
  public function addConditions(array $conditions): static {
    foreach ($conditions as $condition) {
      $this->addCondition($condition);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addCondition(QueryConditionInterface $condition): static {
    $this->conditions[] = $condition;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function condition(string $path, string $operation, mixed $value): static {
    return $this->addCondition($this->conditionFactory->create($path, $operation, $value));
  }

  /**
   * {@inheritdoc}
   */
  public function getSortFactory(): QuerySortFactoryInterface {
    return $this->sortFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getSorts(): array {
    return $this->sorts;
  }

  /**
   * {@inheritdoc}
   */
  public function setSorts(array $sorts): static {
    $this->sorts = [];
    return $this->addSorts($sorts);
  }

  /**
   * {@inheritdoc}
   */
  public function addSorts(array $sorts): static {
    foreach ($sorts as $sort) {
      $this->addSort($sort);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addSort(QuerySortInterface $sort): static {
    $this->sorts[] = $sort;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function sort(string $path, string $operation): static {
    return $this->addSort($this->sortFactory->create($path, $operation));
  }

  /**
   * {@inheritdoc}
   */
  public function getGroupFactory(): QueryGroupFactoryInterface {
    return $this->groupFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getGroups(): array {
    return $this->groups;
  }

  /**
   * {@inheritdoc}
   */
  public function setGroups(array $groups): static {
    $this->groups = [];
    return $this->addGroups($groups);
  }

  /**
   * {@inheritdoc}
   */
  public function addGroups(array $groups): static {
    foreach ($groups as $group) {
      $this->addGroup($group);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addGroup(QueryGroupInterface $group): static {
    $this->groups[] = $group;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function group(string $path, string $operation): static {
    $this->addGroup($this->groupFactory->create($path, $operation));
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRangeFactory(): QueryRangeFactoryInterface {
    return $this->rangeFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getRange(): ?QueryRangeInterface {
    return $this->range;
  }

  /**
   * {@inheritdoc}
   */
  public function setRange(?QueryRangeInterface $range): static {
    $this->range = $range;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function range(int $offset, ?int $count): static {
    return $this->setRange($this->rangeFactory->create($offset, $count));
  }

  /**
   * {@inheritdoc}
   */
  public function execute(): \Generator {
    foreach ($this->source->execute($this) as $item) {
      yield $item;
    }
  }

}
