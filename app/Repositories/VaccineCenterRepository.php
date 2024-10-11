<?php

namespace App\Repositories;

use App\Repositories\VaccineCenterRepositoryInterface;
use App\Models\VaccineCenter;

class VaccineCenterRepository implements VaccineCenterRepositoryInterface
{
    public function all()
    {
        return VaccineCenter::all();
    }

    public function find($id)
    {
        return VaccineCenter::find($id);
    }
}
