<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineRegistrationRequest;
use App\Repositories\VaccineRegistrationServiceInterface;
use Illuminate\Http\Request;
use Exception;

class VaccineRegistrationController extends Controller
{
    protected $vaccineRegistrationService;

    public function __construct(VaccineRegistrationServiceInterface $vaccineRegistrationService)
    {
        $this->vaccineRegistrationService = $vaccineRegistrationService;
    }

    public function showRegistrationForm()
    {
        $centers = $this->vaccineRegistrationService->getVaccineCenters();
        $registrations = $this->vaccineRegistrationService->getVaccineRegistrations();

        return view('register', compact('centers', 'registrations'));
    }

    public function register(VaccineRegistrationRequest $request)
    {
        $this->vaccineRegistrationService->register($request);
        return redirect()->back()->with('success', 'Registration successful! Your status is Not Scheduled.');
    }

    // Scheduling vaccinations individually
    public function scheduleVaccinations($id)
    {
        try {
            $scheduledDate = $this->vaccineRegistrationService->scheduleVaccinationById($id);

            return view('vaccination_schedule', [
                'message' => 'Vaccination scheduling completed.',
                'scheduledDate' => $scheduledDate,
            ]);

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error scheduling vaccination: ' . $e->getMessage());
        }
    }

    // Marking as vaccinated individually
    public function markAsVaccinated($id)
    {
        try {
            $updatedRegistration = $this->vaccineRegistrationService->markAsVaccinatedById($id);

            return view('mark_as_vaccinated', [
                'message' => 'Vaccination status updated successfully.',
                'updatedRegistrations' => $updatedRegistration,
            ]);

        } catch (Exception $e) {
            // Handle any exception that occurs
            return redirect()->back()->with('error', 'Error marking as vaccinated: ' . $e->getMessage());
        }
    }
}
