<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\CandidateRepository::class,
                        \App\Repositories\CandidateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VoterRepository::class,
                        \App\Repositories\VoterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlanRepository::class,
                        \App\Repositories\PlanRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CollaboratorRepository::class,
                        \App\Repositories\CollaboratorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StateRepository::class,
                        \App\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CityRepository::class,
                        \App\Repositories\CityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RegionRepository::class,
                        \App\Repositories\RegionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OccupationRepository::class,
                        \App\Repositories\OccupationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PackageRepository::class,
                        \App\Repositories\PackageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SendmailRepository::class,
                        \App\Repositories\SendmailRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class,
                        \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EducateducationRepository::class, \App\Repositories\EducateducationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BrokenRepository::class, \App\Repositories\BrokenRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EducationsRepository::class, \App\Repositories\EducationsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RolerRepository::class, \App\Repositories\RolerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VoterMoreInformationRepository::class, \App\Repositories\VoterMoreInformationRepositoryEloquent::class);
        //:end-bindings:
    }
}
