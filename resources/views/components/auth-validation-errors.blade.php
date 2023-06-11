@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600 login-errors-label">
            {{ __('Whoops! Something went wrong.') }}

            <ul class="mt-3 list-disc list-inside text-sm text-red-600 login-errors">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>

    </div>
@endif
