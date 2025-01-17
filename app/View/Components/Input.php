<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $name, public $label = null, public $class = null, public $id = null, public $type = 'text', public $wire = 'default', public $value = null, public $placeholder = null)
    {
        if (! $this->label) {
            $this->label = Str::headline($this->name);
        }
        if (! $this->id) {
            $this->id = $this->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
