<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class layout extends Component
{
    public $cancelRoute ;
    public function __construct($cancelRoute)
    {
        $this->cancelRoute = $cancelRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.layout');
    }
}
