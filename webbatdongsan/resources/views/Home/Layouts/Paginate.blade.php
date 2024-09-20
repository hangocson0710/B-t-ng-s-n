<?php
$link_limit = 4; // maximum number of links (a little bit inaccurate, but will be ok for now)
$query_string = \Request::except(['page','request_list_scope']);
$query_string = http_build_query($query_string,'','&');
?>
@if ($paginator->hasPages())
<div class="ltn__pagination-area text-center">
    <div class="ltn__pagination">
        <ul>
            @if ($paginator->currentPage() != 2 && !$paginator->onFirstPage())
            <li><a href="{{ \Request::url() .'?'. $query_string }}"><i class="fas fa-angle-double-left"></i></a></li>
            @endif
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <?php
                    $half_total_links = floor($link_limit / 2);
                    $from = $paginator->currentPage() - $half_total_links;
                    $to = $paginator->currentPage() + $half_total_links;
                    if ($paginator->currentPage() < $half_total_links) {
                        $to += $half_total_links - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                    ?>
                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a href="{{ $paginator->url($i) .'&'. $query_string }}">{{$i}}</a></li>
                @endfor

{{--            <li class="active"><a href="#">2</a></li>--}}
{{--            <li><a href="#">3</a></li>--}}
{{--            <li><a href="#">...</a></li>--}}
{{--            <li><a href="#">10</a></li>--}}
                @if ($paginator->hasMorePages() && $paginator->currentPage() + 1 != $paginator->lastPage())
            <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                @endif
        </ul>
    </div>
</div>
@endif
