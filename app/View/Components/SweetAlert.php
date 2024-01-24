<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SweetAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $message;
    public $type;
    public function __construct($title, $message,$type)
    {
        //
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sweet-alert');
    }
}
