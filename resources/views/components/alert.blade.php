@if (session()->has('success'))
    <div class="card">
        <mark class="tertiary">
            <span class="icon-bookmark inverse"></span> {{ session('success') }}
        </mark>
    </div>
@endif

@if (session()->has('failed'))
    <div class="card">
        <mark class="secondary">
            <span class="icon-alert inverse"></span> {{ session('failed') }}
        </mark>
    </div>
@endif
