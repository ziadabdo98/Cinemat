@if( session()->has('flash') )
<div class="flash-message fixed-bottom bg-light border rounded p-3" style="bottom:15px; right:15px; left:auto;">
    <span class="text-{{ session('flash') }} font-weight-bold">{{ session('message') }}</span>
</div>
@endif