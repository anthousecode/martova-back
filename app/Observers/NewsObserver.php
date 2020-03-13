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
    public function created(News $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "updated" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function updated(News $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "deleted" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function deleted(News $modelsNews)
    {
        \MediaManager::deleteFile($modelsNews->image);
    }

    /**
     * Handle the models news "restored" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function restored(News $modelsNews)
    {
        //
    }

    /**
     * Handle the models news "force deleted" event.
     *
     * @param  \App\ModelsNews  $modelsNews
     * @return void
     */
    public function forceDeleted(News $modelsNews)
    {
        //
    }
}
