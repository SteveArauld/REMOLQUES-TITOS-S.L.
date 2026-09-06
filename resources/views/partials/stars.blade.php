@php($r = (int) round($rating ?? 0))
<span class="stars" title="{{ number_format($rating ?? 0, 1) }} / 5">
    @for ($i = 1; $i <= 5; $i++)<span class="{{ $i <= $r ? '' : 'off' }}">&#9733;</span>@endfor
</span>
