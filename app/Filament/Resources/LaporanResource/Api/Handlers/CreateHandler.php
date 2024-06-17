<?php
namespace App\Filament\Resources\LaporanResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\LaporanResource;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = LaporanResource::class;
    public static bool $public = true;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(Request $request)
    {
        $model = new (static::getModel());
        $random_number = random_int(100000, 999999);
        $model->fill(
            $request->all(),
        );
        if ($request->lampiran) {
            $uploadFolder = 'lampiran';
            $image = $request->lampiran;
            $path = $image->store($uploadFolder, 'public');
            $url = Storage::disk('public')->url($path);
            $model->lampiran = $path;
        }
        $model->laporan_id = (int)$random_number;
        $model->save();
        return static::sendSuccessResponse($model, "success");
    }

    
}