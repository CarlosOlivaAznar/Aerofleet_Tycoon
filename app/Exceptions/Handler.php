<?php

namespace App\Exceptions;

use App\Models\ErrorHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            /* error_log($e->getMessage() . " " . $e->getFile() . " " . auth()->id()); */
            ErrorHandler::create([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'user_id' => auth()->id(),
            ]);
        });
    }
}
