<?php

namespace App\Traits;

trait RecentRecords
{
    public function scopeRecent($query)
    {
        return $query->where($this->getTable() . '.created_at', '>', now()->subDay(7));
    }
}
