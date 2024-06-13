<?php

namespace App\Exceptions;

use Exception;

class NotFoundHttpException extends Exception
{
    public function render($request)
    {
        return response()->view("errors.404", [], 404);
    }

    public function render1($request)
    {
        return response()->view("errors.403", [], 403);
    }

    public function render2($request)
    {
        return response()->view("errors.419", [], 419);
    }

    public function render3($request)
    {
        return response()->view("errors.500", [], 500);
    }
}

