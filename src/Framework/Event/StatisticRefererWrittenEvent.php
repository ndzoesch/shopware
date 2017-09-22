<?php declare(strict_types=1);

namespace Shopware\Framework\Event;

class StatisticRefererWrittenEvent extends NestedEvent
{
    const NAME = 'statistic_referer.written';

    /**
     * @var string[]
     */
    private $statisticRefererUuids;

    /**
     * @var NestedEventCollection
     */
    private $events;

    /**
     * @var array
     */
    private $errors;

    public function __construct(array $statisticRefererUuids, array $errors = [])
    {
        $this->statisticRefererUuids = $statisticRefererUuids;
        $this->events = new NestedEventCollection();
        $this->errors = $errors;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @return string[]
     */
    public function getStatisticRefererUuids(): array
    {
        return $this->statisticRefererUuids;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function addEvent(NestedEvent $event): void
    {
        $this->events->add($event);
    }

    public function getEvents(): NestedEventCollection
    {
        return $this->events;
    }
}