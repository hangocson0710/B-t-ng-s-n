<?php

namespace App\View\Components\Home\Index;

use Illuminate\View\Component;

class Banner extends Component
{
    public  $banner;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $banner = \App\Models\Banner::where('is_show',1)->get();
        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.index.banner');
    }
}
