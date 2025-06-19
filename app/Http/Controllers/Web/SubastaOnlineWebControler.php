<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
class SubastaOnlineWebControler extends Controller{
    public function index(): Response{
        return Inertia::render('Panel/Subastas/indexSubastas');
    }
}
