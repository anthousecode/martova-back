<?php

namespace App\Observers;

use App\Models\Gallery;
use App\Services\Cloud\GoogleDrive;

class GalleryObserver
{
    protected $googleDrive;

    public function __construct(GoogleDrive $google)
    {
        $this->googleDrive = $google;
    }

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
//        $file = null;
//        try {
//            $file = $this->googleDrive->getFile($gallery->image);
//        } catch (\Exception $e) {
//            return;
//        }
//        if ($file) {
//            $this->googleDrive->storeFileOnAdminSaving('gallery_images',
//                $file,
//                Gallery::class,
//                $gallery->id,
//                'image'
//            );
//        }
    }

    public function updating(Gallery $gallery)
    {
        try {
            $this->googleDrive->deleteFileById($gallery->image);
        } catch (\Exception $e) {
            return;
        }
    }

    /**
     * Handle the gallery "deleted" event.
     *
     * @param  \App\Gallery  $gallery
     * @return void
     */
    public function deleted(Gallery $gallery)
    {
        $this->googleDrive->deleteFileById($gallery->image);
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
