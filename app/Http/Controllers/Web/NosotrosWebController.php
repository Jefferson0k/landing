<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
class NosotrosWebController extends Controller{
    public function index(): Response{
        return Inertia::render('Panel/Nosotros/ViewsNosotosGeneral');
    }
    public function blog(): Response{
        return Inertia::render('Panel/Blog/indexBlog');
    }
    public function contactanos(): Response{
        return Inertia::render('Panel/Contactanos/indexContactanos');
    }
    public function productos(): Response{
        return Inertia::render('Panel/Productos/indexProductos');
    }
}
