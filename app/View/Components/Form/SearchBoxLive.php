<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBoxLive extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $placeholder = 'Search...', public $name = 'search') {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.search-box-live');
    }
}
