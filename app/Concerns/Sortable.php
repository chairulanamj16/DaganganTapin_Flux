<?php

namespace App\Concerns;

trait Sortable
{
    public string $sortBy = '';
    public string $sortDirection = 'asc';

    public function sort($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function sortDesc($field)
    {
        $this->sortBy = $field;
        $this->sortDirection = 'desc';
    }

    public function sortAsc($field)
    {
        $this->sortBy = $field;
        $this->sortDirection = 'asc';
    }
}
