<?php

namespace App\View\Components\Home\Classified;

use Illuminate\View\Component;

class ItemCol extends Component
{
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.classified.item-col');
    }
}
