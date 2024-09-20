<?php

namespace App\View\Components\Home\Layout;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Header extends Component
{
    public $about;
    public $group_parent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $group_parent = Group::where('parent_id',null)->get();
        $about = DB::table('about')->first();
        $this->about = $about;
        $this->group_parent = $group_parent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.layout.header');
    }
}
