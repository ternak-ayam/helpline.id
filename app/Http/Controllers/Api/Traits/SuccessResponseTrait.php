<?php

namespace App\Http\Controllers\API\Traits;

trait SuccessResponseTrait {
    public function success(): array
    {
        return [
          'data' => new \stdClass(),
        ];
    }
}
