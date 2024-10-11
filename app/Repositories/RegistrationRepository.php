<?php

namespace App\Repositories;

use App\Repositories\RegistrationRepositoryInterface;
use App\Models\Registration;

class RegistrationRepository implements RegistrationRepositoryInterface
{
    public function all()
    {
        return Registration::all();
    }

    public function find($id){
        return Registration::find($id);
    }

    public function create(array $data)
    {
        return Registration::create($data);
    }

    public function update($registration, array $data)
    {
        $registration->update($data);
        return $registration;
    }

    public function findNotScheduled()
    {
        return Registration::where('status', 'Not scheduled')->get();
    }

    public function findScheduled()
    {
        return Registration::where('status', 'Scheduled')->get();
    }

    public function findScheduledCount($centerId, $date)
    {
        return Registration::where('vaccine_center_id', $centerId)
            ->where('scheduled_date', $date)
            ->count();
    }
}
