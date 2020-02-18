<?php

namespace App\Observers;

use App\Models\Area;

class AreaObserver
{
    /**
     * Handle the models area "created" event.
     *
     * @param  \App\ModelsArea  $modelsArea
     * @return void
     */
    public function created(Area $modelsArea)
    {
        //
    }

    /**
     * Handle the models area "updated" event.
     *
     * @param  \App\ModelsArea  $modelsArea
     * @return void
     */
    public function updated(Area $modelsArea)
    {
        //
    }

    /**
     * Handle the models area "deleted" event.
     *
     * @param  \App\ModelsArea  $modelsArea
     * @return void
     */
    public function deleted(Area $modelsArea)
    {
        $googleDrive = new \App\Services\Cloud\GoogleDrive;
        $googleDrive->deleteFileById($modelsArea->image);
        $googleDrive->deleteFileById($modelsArea->plan);
        $googleDrive->deleteFileById($modelsArea->survey);
    }

    /**
     * Handle the models area "restored" event.
     *
     * @param  \App\ModelsArea  $modelsArea
     * @return void
     */
    public function restored(Area $modelsArea)
    {
        //
    }

    /**
     * Handle the models area "force deleted" event.
     *
     * @param  \App\ModelsArea  $modelsArea
     * @return void
     */
    public function forceDeleted(Area $modelsArea)
    {
        //
    }
}
