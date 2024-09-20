<?php

namespace App\View\Components\Home\Classified;

use App\Models\Classified;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ClassifiedNews extends Component
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
        $param['classified'] = Classified::
            leftJoin('province', 'classified.province_id', '=', 'province.id')
            ->leftJoin('district', 'classified.district_id', '=', 'district.id')
            ->leftJoin('ward', 'classified.ward_id', '=', 'ward.id')
            ->select('classified.*', 'province.province_name', 'district.district_name', 'ward.ward_name')
            ->take($param['config']->num_classified)
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
        return view('components.home.classified.classified-news');
    }
}
