<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.02.20
 * Time: 20:45
 */

namespace App\Services\Cloud;

use Google_Client;
use Google_Service_Drive;
use Illuminate\Http\Response;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\UploadedFile;

class GoogleDrive
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
    ];

    public function __construct()
    {
        $client = new Google_Client();
        $client->setApplicationName(config('services.google.name'));
        $client->addScope(\Google_Service_Drive::DRIVE_FILE);
        $client->addScope(\Google_Service_Drive::DRIVE);
        $client->setDeveloperKey(config('services.google.key'));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . public_path() . '/martova-5f65bbf30170.json');
        $client->useApplicationDefaultCredentials();
        $this->googleService = new Google_Service_Drive($client);
    }

    public function getFolderId(string $name): string
    {
        return $this->folders[$name];
    }

    public function getFilesByFolderId(string $folderID)
    {
        $result = $this->googleService->files->listFiles([
            'q' => sprintf("'%s' in parents", $folderID),
            'fields' => 'files(*)',
        ]);
        return $result->getFiles();
    }

    public function downloadFile(string $fileID)
    {
        $file = $this->googleService->files->get($fileID, []);

        return Response::download($file, 'test', [
            'Content-Type: application/json',
        ]);
    }

    public function uploadFile(UploadedFile $file, string $folderID): string
    {
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension(),
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
        dd($newFILE);
        return $newFILE->id;
    }
}