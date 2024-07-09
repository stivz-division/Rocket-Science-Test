<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class FilterData
{

    /**
     * @var array|FilterItemData[]
     */
    public array $properties = [];

    public function __construct(
        array $properties = []
    ) {
        foreach ($properties as $property => $values) {
            foreach ($values as $value) {
                $this->properties[] = new FilterItemData(
                    $property,
                    $value
                );
            }
        }
    }

}