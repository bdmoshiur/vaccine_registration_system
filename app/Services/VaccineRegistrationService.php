<?php

namespace App\Services;

use App\Repositories\VaccineRegistrationServiceInterface;
use App\Repositories\RegistrationRepositoryInterface;
use App\Repositories\VaccineCenterRepositoryInterface;
use App\Mail\VaccineScheduled;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class VaccineRegistrationService implements VaccineRegistrationServiceInterface
{
    protected $registrationRepo;
    protected $vaccineCenterRepo;

    public function __construct(RegistrationRepositoryInterface $registrationRepo, VaccineCenterRepositoryInterface $vaccineCenterRepo)
    {
        $this->registrationRepo = $registrationRepo;
        $this->vaccineCenterRepo = $vaccineCenterRepo;
    }

    public function register($request)
    {
        return $this->registrationRepo->create([
            'nid' => $request->nid,
            'name' => $request->name,
            'email' => $request->email,
            'vaccine_center_id' => $request->vaccine_center_id,
            'status' => 'Not scheduled',
        ]);
    }

    public function scheduleVaccinationById($id)
    {
        $registration = $this->registrationRepo->find($id);

        if ($registration->status != 'Not scheduled') {
            throw new \Exception('Registration is already scheduled or vaccinated.');
        }

        $center = $registration->vaccineCenter;
        $today = Carbon::now();

        $scheduledCount = $this->registrationRepo->findScheduledCount($center->id, $today->toDateString());

        if ($scheduledCount < $center->daily_limit) {
            $this->registrationRepo->update($registration, [
                'scheduled_date' => $today->toDateString(),
                'status' => 'Scheduled'
            ]);
            Mail::to($registration->email)->send(new VaccineScheduled($registration));
        } else {
            $nextAvailableDate = $this->getNextAvailableWeekday();
            $this->registrationRepo->update($registration, [
                'scheduled_date' => $nextAvailableDate,
                'status' => 'Scheduled'
            ]);
            Mail::to($registration->email)->send(new VaccineScheduled($registration));
        }

        return $today->toDateString();
    }

    public function markAsVaccinatedById($id)
    {
        $registration = $this->registrationRepo->find($id);

        if ($registration->status != 'Scheduled') {
            throw new \Exception('Only scheduled registrations can be marked as vaccinated.');
        }

        $this->registrationRepo->update($registration, ['status' => 'Vaccinated']);
        return $registration;
    }

    public function getNextAvailableWeekday()
    {
        $date = Carbon::now()->addDay();
        while ($date->isFriday() || $date->isSaturday()) {
            $date->addDay();
        }
        return $date->toDateString();
    }

    public function getVaccineCenters()
    {
        return $this->vaccineCenterRepo->all();
    }

    public function getVaccineRegistrations()
    {
        return $this->registrationRepo->all();
    }
}
