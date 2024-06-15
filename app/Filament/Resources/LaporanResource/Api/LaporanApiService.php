<?php
namespace App\Filament\Resources\LaporanResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\LaporanResource;
use Illuminate\Routing\Router;


class LaporanApiService extends ApiService
{
    protected static string | null $resource = LaporanResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            // Handlers\UpdateHandler::class,
            // Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            // Handlers\DetailHandler::class
        ];

    }
}
