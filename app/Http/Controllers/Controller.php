<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Handle Error Message nicely.
     *
     * @param \Exception $e
     */
    public function handleFlashMessage(\Exception $e)
    {
        if (env('APP_DEBUG')) {
            session()->flash('error', $e->getMessage());
        } else {
            session()->flash('error', 'Something went wrong. Please contact your system administrator.');
        }
    }
}
