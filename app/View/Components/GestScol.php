<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GestScol extends Component
{
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string title
     * @return void
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $title = $this->title;
        return view('components.gest-scol',compact('title'));
    }
}
