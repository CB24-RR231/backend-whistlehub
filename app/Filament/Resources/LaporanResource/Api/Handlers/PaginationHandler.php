<?php
namespace App\Filament\Resources\LaporanResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use App\Filament\Resources\LaporanResource;

class PaginationHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = LaporanResource::class;
    public static bool $public = true;


    public function handler()
    {
        $query = static::getEloquentQuery();
        $model = static::getModel();

        $query = QueryBuilder::for($query)
        ->allowedFields($model::$allowedFields ?? [])
        ->allowedSorts($model::$allowedSorts ?? [])
        ->allowedFilters($model::$allowedFilters ?? [])
        ->allowedIncludes($model::$allowedIncludes ?? null)
        ->get();

        return static::getApiTransformer()::collection($query);
    }
}
