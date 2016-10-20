<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exception\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        $message = "";

        if ($e instanceof ModelNotFoundException) {
            $className = class_basename( $e->getModel() );
            $message = "No {$className} found with this ID.";
            
        }else if($e instanceof AuthException){
            $message = $e->getMessage();

        }else if($e instanceof HttpResponseException){
            $response = $e->getResponse();
            if( $response && isset($response->original)){
                $message = $e->getResponse()->original;
            }
        }

        if($message == ""){
            return parent::render($request, $e);
        }
        
        if( $request->ajax() ){
            return response()->json(["success"=>false, "message" => $message ]);
        }else{
            return response()->view('errors.custom', [], 500);
        }

    }
}
