<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    /**
     * Handle the models news "created" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function created(ModelsNews $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "updated" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function updated(ModelsNews $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "deleted" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function deleted(ModelsNews $modelsNews)
    {
        $googleDrive = new \App\Services\Cloud\GoogleDrive;
        $googleDrive->deleteFileById($modelsNews->image);
    }

    /**
     * Handle the models news "restored" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function restored(ModelsNews $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "force deleted" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function forceDeleted(ModelsNews $modelsNews)
    {
        //
    }
}
