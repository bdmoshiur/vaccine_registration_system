<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\VaccineRegistrationServiceInterface;
use App\Services\VaccineRegistrationService;
use App\Repositories\RegistrationRepository;
use App\Repositories\VaccineCenterRepository;
use App\Repositories\RegistrationRepositoryInterface;
use App\Repositories\VaccineCenterRepositoryInterface;

class VaccineServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind services and repositories
        $this->app->bind(VaccineRegistrationServiceInterface::class, VaccineRegistrationService::class);
        $this->app->bind(RegistrationRepositoryInterface::class, RegistrationRepository::class);
        $this->app->bind(VaccineCenterRepositoryInterface::class, VaccineCenterRepository::class);
    }

    public function boot()
    {
        //
    }
}
