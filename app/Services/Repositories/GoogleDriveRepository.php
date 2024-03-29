<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.03.20
 * Time: 23:24
 */

namespace App\Services\Repositories;

use App\Services\Repositories\Abstractions\IMediaManager;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Class GoogleDriveRepository
 * @package App\Services\Repositories
 */
class GoogleDriveRepository implements IMediaManager
{
    protected $googleService;

    // name => id
    protected $folders = [
        'areas_images' => '18tgWhTzj7O5MTlVIcvvVsssjWmKwIZL0',
        'areas_cad_plans' => '1B5XafMgRhpja88kDDwqiEzy5EGC7-1L4',
        'areas_geo_record' => '17_vQ3At7Dk9lBUsu-rZ91XdAg7GPCldH',
        'infrastructure_3d_images' => '162Gd4WGFVF1hKyBrs3ZeOk2aDNMyFuaw',
        'infrastructure_videos' => '1CItSnHth9MIZmhc-sqVfXqtH6SQAMEJC',
        'gallery_images' => '1JH3k3LFWUbrAz-cOydqETMjof7rcFwD2',
        'news_images' => '17dhKe5BCxGyJORpE9InTwiiSAm5uumXB',
        'areas_3d_images' => '1Nahv3H6tyzeOHZGMXMFOvu1jtiGZrySj',
        'comments_images' => '1zCBgnxmr6ViN8BNlwPUbmqoxoTHt03qz',
        'areas_print_plans' => '1plYVjtTzsfK1ME5whA6K94cPIDT6coRv',
    ];

    public function __construct()
    {
	try {
        $client = new Google_Client();
        $client->setApplicationName(config('services.google.name'));
        $client->addScope(\Google_Service_Drive::DRIVE, \Google_Service_Drive::DRIVE_FILE, \Google_Service_Drive::DRIVE_APPDATA);
        $client->setDeveloperKey(config('services.google.key'));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . public_path() . '/martova-5f65bbf30170.json');
        $client->useApplicationDefaultCredentials();
	$this->googleService = new Google_Service_Drive($client);
        } catch(\Exception $e) {
          logException(__CLASS__, __METHOD__, $e->getMessage());
	}
    }

    public function getFolderId(string $name): string
    {
        return $this->folders[$name];
    }

    protected function getFilesByFolderId(string $folderID)
    {
	try {
        $result = $this->googleService->files->listFiles([
            'q' => sprintf("'%s' in parents", $folderID),
            'fields' => 'files(*)',
        ]);
	$files = $result->getFiles();
	} catch (\Exception $e) {
		logException(__CLASS__, __METHOD__, $e->getMessage());
		return [];
	}
	return $files;
    }

    public function downloadFile(string $fileID): ?\Symfony\Component\HttpFoundation\StreamedResponse
    {
	try {
        $file = $this->googleService->files->get($fileID, ['alt' => 'media']);

        $path = public_path() . '/placeholder';
        File::put($path, $file->getBody()->getContents());
        } catch (\Exception $e) {
           logException(__CLASS__, __METHOD__, $e->getMessage());
	   return null;
	}
        return \Illuminate\Support\Facades\Response::download($path, 'file', []);
    }

    public function getFile(string $fileId)
    {
	try {
		$file = $this->googleService->files->get($fileId, ['alt' => 'media']);
	} catch (\Exception $e) {
           logException(__CLASS__, __METHOD__, $e->getMessage());
	   return '';
	}
        return $file;
    }

    public function uploadFile(\Illuminate\Http\UploadedFile $file, ?string $folderID): string
    {
	try {
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => [$folderID],
        ]);
        $content = $file->get();

        $newFILE = $this->googleService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $file->getClientMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]
        );
        $newPermission = new \Google_Service_Drive_Permission();
        $newPermission->setType('anyone');
        $newPermission->setRole('reader');
	$this->googleService->permissions->create($newFILE->id, $newPermission);
	 } catch (\Exception $e){
		 logException(__CLASS__, __METHOD__, $e->getMessage());
		 return '';
	 }
        return $newFILE->id;
    }

    public function storeFileOnAdminSaving(string $folderName, ?\Illuminate\Http\UploadedFile $file, string $model, int $entityID, string $field): void
    {
	    if (is_null($file)) {
                    return;
	    } 
	    $entity = $model::find($entityID);
	    try {
        $folderID = $this->getFolderId($folderName);
	$id = $this->uploadFile($file, $folderID);
	    } catch (\Exception $e) {
           logException(__CLASS__, __METHOD__, $e->getMessage());
	}
        $entity->$field = $id;
	$entity->save();
	    
    }

    public function getFileLink(?string $fileId): string
    {
	    if (!is_null($fileId)) { 
		    try {
			    $this->googleService->files->get($fileId, ["fields" => "webViewLink"]);
		    } catch (\Exception $e) {
			    logException(__CLASS__, __METHOD__, $e->getMessage());
			    return '';
		    }
	 } 
	 return '';
    }

    public function fetchAllFiles($folId = null)
    {
        $files = [];
        $foldersIds = [];
        if (is_null($folId)) {
            foreach ($this->folders as $folderName => $folderId) {
                $foldersIds[] = $folderId;
            }
        } else {
            $foldersIds[] = $folId;
	}
	try {
        foreach ($foldersIds as $folderId) {
            $files[] = $this->googleService->files->listFiles([
                'q' => "'" . $folderId . "' in parents",
                'fields' => 'files(id,webViewLink)',
            ]);
	}
	

        $urls = [];
        foreach ($files as $file) {
            if (count($file->files) > 0) {
                foreach ($file->files as $f) {
                    $urls[$f->id] = $f->webViewLink;
                }
            }
	} 
	} catch (\Exception $e) {
           logException(__CLASS__, __METHOD__, $e->getMessage());
	   return [];
	}
        return $urls;
    }

    public function deleteFile(?string $fileId): void
    {
	    if (is_null($fileId)) {
               return;
	    }
        try {
            $this->googleService->files->delete($fileId);
        } catch (\Exception $e) {
		logException(__CLASS__, __METHOD__, $e->getMessage());
		return;
        }
    }
}
