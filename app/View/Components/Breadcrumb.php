<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $array;
    public $lastItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($array, $lastItem)
    {
        $this->array = $array;
        $this->lastItem = $lastItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
