<?php

namespace App\Traits;

trait RecentRecords
{
    /**
     * @param $query
     * @return object
     */
    public function scopeRecent($query): object
    {
        return $query->where($this->getTable().'.created_at', '>', now()->subDay(7));
    }
}
