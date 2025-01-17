<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    public function __construct(public $name, public $options, public $label = null, public $class = null, public $id = null, public $wire = 'default', public $value = null, public $placeholder = null)
    {
        if (! $this->label) {
            $this->label = Str::headline($this->name);
        }
        if (! $this->id) {
            $this->id = $this->name;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}
