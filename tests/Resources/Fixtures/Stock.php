<?php

declare(strict_types = 1);

namespace Tshinow\JsonApi\Tests\Resources\Fixtures;

class Stock
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @param int $id
     *
     * @return Stock
     */
    public function setId(int $id): Stock
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $quantity
     *
     * @return Stock
     */
    public function setQuantity(int $quantity): Stock
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}