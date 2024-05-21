<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Gallery extends Component
{
    public $collections;
    /**
     * Create a new component instance.
     */
    public function __construct($collections)
    {
        $this->collections = $collections;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery');
    }
}
