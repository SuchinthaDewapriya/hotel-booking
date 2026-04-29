<?php

namespace App\Exceptions;

<<<<<<< HEAD
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
=======
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class Handler extends ExceptionHandler
{
    /**
<<<<<<< HEAD
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
=======
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        'password',
        'password_confirmation',
    ];

    /**
<<<<<<< HEAD
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
=======
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    }
}
