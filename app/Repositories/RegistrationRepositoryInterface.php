<?php

namespace App\Repositories;

interface RegistrationRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($registration, array $data);
    public function findNotScheduled();
    public function findScheduled();
    public function findScheduledCount($centerId, $date);
}
