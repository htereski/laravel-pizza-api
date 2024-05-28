<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PizzaResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $items = [];

        foreach ($this->collection as $item) {
            $items[] = [
                'id' => $item->id,
                'name' => $item->name,
                'kind' => [
                    'id' => $item->kind->id,
                    'name' => $item->kind->name
                ]
            ];
        }

        return [
            'data' => $items,
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
                'links' => [
                    'next' => $this->nextPageUrl(),
                    'previous' => $this->previousPageUrl(),
                ],
            ],
        ];
    }
}
