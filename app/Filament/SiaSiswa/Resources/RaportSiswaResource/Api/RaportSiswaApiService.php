<?php
namespace App\Filament\SiaSiswa\Resources\RaportSiswaResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\SiaSiswa\Resources\RaportSiswaResource;
use Illuminate\Routing\Router;


class RaportSiswaApiService extends ApiService
{
    protected static string | null $resource = RaportSiswaResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
