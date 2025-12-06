<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ketikwae extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $type;
    public $value;
    public $required;
    public $maxLength; // Tambahkan ini

    public function __construct($name, $label, $type = 'text', $value = '', $required = false, $maxLength = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->maxLength = $maxLength;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ketikwae');
    }
}
