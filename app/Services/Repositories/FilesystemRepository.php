<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.03.20
 * Time: 23:24
 */

namespace App\Services\Repositories;

use App\Services\Repositories\Abstractions\IMediaManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FilesystemRepository implements IMediaManager
{
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::disk('admin');
    }

    public function downloadFile(string $filePath): ?\Symfony\Component\HttpFoundation\StreamedResponse
    {
        try {
            $file = $this->storage->get($filePath);
        } catch (\Exception $e) {
            logException(__CLASS__, __METHOD__, $e->getMessage());
            return null;
        }
        return \Illuminate\Support\Facades\Response::download($file, 'file', []);
    }

    public function getFile(string $filePath)
    {
        try {
            $file = $this->storage->get($filePath);
        } catch (\Exception $e) {
            logException(__CLASS__, __METHOD__, $e->getMessage());
            return null;
        }
        return $file;
    }

    public function uploadFile(UploadedFile $file, ?string $path): string
    {
        try {
            $fileName = uniqid('', true) . $file->getClientOriginalName();
            $path = $this->storage->put($fileName, $file);
        } catch (\Exception $e) {
            logException(__CLASS__, __METHOD__, $e->getMessage());
            return '';
        }
        return $path;
    }

    // DEPRECATED BECAUSE OF ADMIN PANEL SAVING
    public function storeFileOnAdminSaving(string $path, UploadedFile $file, string $model, int $entityID, string $fieldName): void
    {
    /*    $entity = $model::find($entityID);
	    try {
	       $path = $this->uploadFile($file, null);
	    } catch (\Exception $e) {
               logException(__CLASS__, __METHOD__, $e->getMessage());
	       return;
            }
        $entity->$fieldName = $path;
        $entity->save();
      */
    }

    public function getFileLink(?string $path): string
    {
	if (!is_null($path)) { 
          try {
              $src = $this->storage->url($path);
	  } catch (\Exception $e) {
	      logException(__CLASS__, __METHOD__, $e->getMessage());
              return '';
       	  }
          return $src;
	} 
        return '';
    }

    public function deleteFile(string $path): void
    {
        try {
            $this->storage->delete($path);
        } catch (\Exception $e) {
		logException(__CLASS__, __METHOD__, $e->getMessage());
		return; 
        }
    }
}
