<?php

namespace App\View\Components\Home\Layout;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Footer extends Component
{
    public $about;
    public $group_classified;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $about = DB::table('about')->first();
        $group_classified = Group::Wherehas('group_classified')->where('group_type',1)->get();
        $this->group_classified = $group_classified;
        $this->about = $about;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.layout.footer');
    }
}
