<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Contract extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function scopeInCompany($query){
        return $query->whereHas('designation', function($q){
            $q->inCompany();
        });
    }

    public function getDurationAttribute(){
        return Carbon::parse($this->start_date)->diffForHumans($this->end_date);
    }

    public function scopeSearchByEmployee($query, $name)
    {
        return $query->whereHas('employee', function($q) use ($name){
            $q->where('name', 'like', "%$name%");
        });
    }

    public function getTotalEarnings($monthYear)
    {
        return $this->rate_type == 'monthly' ? $this->rate : $this->rate * Carbon::parse($monthYear)->daysInMonth;
    }

}
