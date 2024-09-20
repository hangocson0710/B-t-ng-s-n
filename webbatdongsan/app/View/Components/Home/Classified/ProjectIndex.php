<?php

namespace App\View\Components\Home\Classified;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ProjectIndex extends Component
{
    public $param;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $param['config'] = DB::table('home_config')->first();
        $param['project'] = Project::
        leftJoin('province', 'province.id', '=', 'project.province_id')
            ->leftJoin('district', 'district.id', '=', 'project.district_id')
            ->leftJoin('ward', 'ward.id', '=', 'project.ward_id')
            ->select('project.*', 'province.province_name', 'district.district_name', 'ward.ward_name')
            ->take($param['config']->num_project)
            ->get();
        $this->param = $param;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.classified.project-index');
    }
}
