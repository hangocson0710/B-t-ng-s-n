<?php

namespace App\View\Components\Home\Index;

use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class NewsList extends Component
{
    public $news;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $param['config'] = DB::table('home_config')->first();

        $news = News::where('is_show',1)->where('is_deleted',0)->get()->take($param['config']->num_news);
       $this->news=$news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.index.news-list');
    }
}
