<?php
namespace App\Traits;

use Log;

trait DeleteModelTrait {
    public function deleteModelTrait($model, $id) {
        try {
            $model->find($id)->delete();
            return [
                'code' => 200,
                'message' => 'success',
                'status' => 200
            ];
        } catch (\Exception $exception) {
            Log::error('Message:' . $exception->getMessage() . '--Line:' . $exception->getLine());
            $this->responseJson(500, 'fail');
            return [
                'code' => 500,
                'message' => 'fail',
                'status' => 500
            ];
        }
    }
}