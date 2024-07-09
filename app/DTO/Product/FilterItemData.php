<?php

declare(strict_types=1);

namespace App\DTO\Product;

final class FilterItemData
{

    public function __construct(
        public string $key,
        public string $value,
    ) {}

}