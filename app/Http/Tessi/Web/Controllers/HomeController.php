<?php

namespace App\Http\Tessi\Web\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Tessi\Web\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.home');
    }
}
