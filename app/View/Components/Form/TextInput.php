<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public function __construct(public $name, public $label = null, public $value = null, public $labelClass = 'required', public $type = 'text', public $placeholder = null) {}

    public function render(): View|Closure|string
    {
        return view('components.form.text-input');
    }
}
