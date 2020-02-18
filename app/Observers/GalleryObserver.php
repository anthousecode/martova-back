<?php

namespace App\Observers;

use App\Models\Gallery;

class GalleryObserver
{
    /**
     * Handle the gallery "created" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function created(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "updated" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function updated(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "deleted" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function deleted(Gallery $gallery)
    {
        dd(1);
       // for ($i=0; $i<10;$i++) {
       //     Gallery::create(['image' => 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAA']);
        //}
    }

    /**
     * Handle the gallery "restored" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function restored(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the gallery "force deleted" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function forceDeleted(Gallery $gallery)
    {
        //
    }
}
