<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    private array $pages = [
        'aviso-legal'                            => 'wp.aviso-legal',
        'politica-privacidad'                    => 'wp.politica-privacidad',
        'terminos-y-condiciones'                 => 'wp.terminos-y-condiciones',
        'politica-de-entregas'                   => 'wp.politica-de-entregas',
        'politica-de-devoluciones-y-reembolsos'  => 'wp.politica-de-devoluciones-y-reembolsos',
    ];

    public function show(string $slug)
    {
        abort_unless(isset($this->pages[$slug]), 404);

        return view($this->pages[$slug]);
    }
}
