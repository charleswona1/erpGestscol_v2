<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Errors extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $name = $this->name;
        return view('components.errors', compact('name'));
    }
}
