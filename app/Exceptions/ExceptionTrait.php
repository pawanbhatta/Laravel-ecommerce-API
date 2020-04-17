<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException; 
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

/**
 * 
 */
trait ExceptionTrait
{
    public function apiException($request, $exception)
    {
        if($this->isModel($exception))
        {
            return $this->modelResponse($exception);
        }            

        if($this->isRoute($exception))
        {
            return $this->routeResponse($exception);
        }

        return parent::render($request, $exception);

    }

    protected function isModel($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    protected function isRoute($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    protected function modelResponse($exception)
    {
        return response()->json([
            'errors'    =>  'Product Model Not Found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function routeResponse($exception)
    {
        return response()->json([
            'errors'    =>  'Incorrect Route'
        ], Response::HTTP_NOT_FOUND);
    }
}