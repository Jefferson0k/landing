<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
class BuscarOportunidadesWebControler extends Controller{
    public function index(): Response{
        return Inertia::render('Panel/BuscarOPortunidades/indexBuscarOPortunidades');
    }
}
