@if (isset($errors) && !is_array($errors) && $errors->has($name))
    @foreach ($errors->get($name) as $message)
        @if (is_array($message))
            @foreach ($message as $m)
                <div class='help-text text-danger'>
                    <i class='fa fa-exclamation-circle'></i>
                    {{ $m }}
                </div>
            @endforeach
        @else
            <div class='help-text text-danger'>
                <i class='fa fa-exclamation-circle'></i>
                {{ $message }}
            </div>
        @endif
    @endforeach
@endif