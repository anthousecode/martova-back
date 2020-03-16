<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.03.20
 * Time: 22:48
 */

namespace App\Services\Repositories\Abstractions;

/**
 * Interface IMediaManager
 */
interface IMediaManager
{
    /**
     * @param string $path
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadFile(string $path): ?\Symfony\Component\HttpFoundation\StreamedResponse;

    /**
     * @param string $path
     * @return string
     */
    public function getFile(string $path);

    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $path
     * @return string
     */
    public function uploadFile(\Illuminate\Http\UploadedFile $file, ?string $path): string;

    /**
     * @param string $path
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $model
     * @param int $entityId
     * @param string $fieldName
     */
    public function storeFileOnAdminSaving(string $path, \Illuminate\Http\UploadedFile $file, string $model, int $entityId, string $fieldName): void;

    /**
     * @param string $path
     * @return string
     */
    public function getFileLink(?string $path): string;

    /**
     * @param string $path
     */
    public function deleteFile(string $path): void;
}
