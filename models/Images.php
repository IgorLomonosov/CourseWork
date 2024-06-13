<?php

namespace models;

use core\Core;
use core\Model;
use Exception;

/**
 * @property int $id
 * @property int $news
 * @property string $image
 */
class Images extends Model
{
    public static $tableName = 'images';

    public static function getImage($newsId)
    {
        $image = Images::findByCondition(['news' => $newsId]);
        if (!empty($image) && isset($image[0]['image'])) {
            return base64_encode($image[0]['image']);
        } else {
            return null;
        }
    }

    public static function saveImage($image, $newsId)
    {
        if ($image['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error.');
        }

        if (!self::checkFile($image)) {
            throw new Exception('Invalid file type.');
        }

        $fileContent = file_get_contents($image['tmp_name']);

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $image['tmp_name']);
        finfo_close($finfo);

        $type = self::determineTypeFromMimeType($mimeType);
        if ($type === null) {
            throw new Exception('Unsupported file type.');
        }

        $existingImage = Images::findByCondition(['news' => $newsId]);
        $isUpdate = !empty($existingImage);
        if ($isUpdate) {
            $images = Images::createObjById($existingImage[0]['id']);
        } else {
            $images = new Images();
        }

        $images->news = $newsId;
        $images->image = $fileContent;

        if ($isUpdate) {
            $images->saveUpdate();
        } else {
            $images->saveInsert();
        }
    }

    private static function checkFile($file)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        return in_array($mimeType, $allowedMimeTypes);
    }

    private static function determineTypeFromMimeType($mimeType)
    {
        $mimeTypeMap = [
            'image/jpeg' => 'jpeg',
            'image/png' => 'png',
            'image/jpg' => 'jpg'
        ];

        return $mimeTypeMap[$mimeType] ?? null;
    }
}
