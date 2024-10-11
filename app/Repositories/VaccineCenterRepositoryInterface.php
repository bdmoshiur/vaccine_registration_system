<?php

namespace App\Repositories;

interface VaccineCenterRepositoryInterface
{
    public function all();
    public function find($id);
}
