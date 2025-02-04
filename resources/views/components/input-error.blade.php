@props(['mess'])

@if ($mess)
    {{-- <ul class="text-red-300" {{ $attributes }}> --}}
        <div class="alert alert-danger" role="alert" {{ $attributes }}>
        @foreach ( $mess as $message)
            <li>{{ $message }}</li>
        @endforeach
        </div>
@endif
