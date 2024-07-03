<?php
namespace App\Filament\SiaAdmin\Resources\UserResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\SiaAdmin\Resources\UserResource;
use Illuminate\Routing\Router;


class UserApiService extends ApiService
{
    protected static string | null $resource = UserResource::class;

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
