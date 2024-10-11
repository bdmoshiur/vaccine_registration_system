<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface VaccineRegistrationServiceInterface
{
    public function register(Request $request);
    public function scheduleVaccinationById($id);
    public function markAsVaccinatedById($id);
    public function getVaccineCenters();
    public function getVaccineRegistrations();
}
