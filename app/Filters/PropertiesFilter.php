<?php

declare(strict_types=1);

namespace App\Filters;

use App\DTO\Product\FilterData;
use Illuminate\Database\Eloquent\Builder;

final class PropertiesFilter
{

    public function __construct(
        protected FilterData $filterData
    ) {}

    public function execute(Builder $query, $next)
    {
        if (count($this->filterData->properties) === 0) {
            return $next($query);
        }

        $query->whereHas('properties', function ($query) {
            $i = 0;

            collect($this->filterData->properties)
                ->groupBy('key')
                ->each(function ($properties, $groupName) use (&$i, $query) {
                    $query->{$i === 0 ? 'where' : 'orWhere'}(function ($query
                    ) use (
                        $groupName,
                        $properties
                    ) {
                        $query->where('title', $groupName);
                        $query->whereIn('value',
                            collect($properties)->pluck('value'));
                    });

                    $i++;
                });
        });

        return $next($query);
    }

}