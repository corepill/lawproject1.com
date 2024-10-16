<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StatusChangeService
{
    /**
     * Change the status of a model.
     *
     * @param Request $request
     * @param Model $model
     * @return \Illuminate\Http\JsonResponse
     */
    public static function changeStatus(Request $request, Model $model)
    {
        // Validasyon
        $request->validate([
            'id' => 'required|exists:' . $model->getTable() . ',id',
            'status' => 'required|boolean'
        ]);

        // Modeli al
        $item = $model::find($request->id);

        if ($item) {

            $item->status = !$item->status;
            $item->save();

            return response()->json([
                'status' => 'success',
                'message' => 'İsteğiniz başarıyla güncellendi!',
                $model->getTable() => [
                    'status' => $item->status,
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => ucfirst($model->getTable()) . ' bulunamadı!'
        ]);
    }
}
