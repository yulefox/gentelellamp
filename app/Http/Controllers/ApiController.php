<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected $statusCode = 200;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond($data, $header = [])
    {
        return response()->json([
            'data' => $data,
        ]);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'msg' => $message,
                'code' => $this->getStatusCode(),
            ],
        ]);
    }

    public function respondNotFound($message = 'Not Found!')
    {
        $this->setStatusCode(404);
        return $this->respondWithError($message);
    }
}
