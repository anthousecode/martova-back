<?php

namespace App\Observers;

use App\Models\Infrastructure;

class InfrastructureObserver
{
    /**
     * Handle the models infrastructure "created" event.
     *
     * @param  \App\ModelsInfrastructure  $modelsInfrastructure
     * @return void
     */
    public function created(Infrastructure $modelsInfrastructure)
    {
        //
    }

    /**
     * Handle the models infrastructure "updated" event.
     *
     * @param  \App\ModelsInfrastructure  $modelsInfrastructure
     * @return void
     */
    public function updated(Infrastructure $modelsInfrastructure)
    {
        //
    }

    /**
     * Handle the models infrastructure "deleted" event.
     *
     * @param  \App\ModelsInfrastructure  $modelsInfrastructure
     * @return void
     */
    public function deleted(Infrastructure $modelsInfrastructure)
    {
        $googleDrive = new \App\Services\Cloud\GoogleDrive;
        $googleDrive->deleteFileById($modelsInfrastructure->image);
        $googleDrive->deleteFileById($modelsInfrastructure->video);
    }

    /**
     * Handle the models infrastructure "restored" event.
     *
     * @param  \App\ModelsInfrastructure  $modelsInfrastructure
     * @return void
     */
    public function restored(Infrastructure $modelsInfrastructure)
    {
        //
    }

    /**
     * Handle the models infrastructure "force deleted" event.
     *
     * @param  \App\ModelsInfrastructure  $modelsInfrastructure
     * @return void
     */
    public function forceDeleted(Infrastructure $modelsInfrastructure)
    {
        //
    }
}
