@php
    $show = false;

    if (session()->has('success')) {
        $show = true;
        $color = 'success';
        $type = 'Berhasil';
        $message = session('success');
    }

    if (session()->has('failed')) {
        $show = true;
        $color = 'danger';
        $type = 'Gagal';
        $message = session('failed');
    }
@endphp

@if ($show)
    <div
        class="alert alert-{{ $color }} alert-dismissible fade show"
        role="alert"
    >
        <strong>{{ $type }}!</strong>
        <span>{{ $message }}.</span>

        <button
            class="btn-close"
            data-bs-dismiss="alert"
            type="button"
            aria-label="Close"
        ></button>
    </div>
@endif
