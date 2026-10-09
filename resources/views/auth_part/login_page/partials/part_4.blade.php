@if (session('success'))
    <div class="login-alert login-alert-success">
        <i class="fas fa-circle-check"></i>

        <span>
            {{ session('success') }}
        </span>
    </div>
@endif

@if ($errors->any())
    <div class="login-alert login-alert-error">
        <i class="fas fa-circle-exclamation"></i>

        <span>
            {{ $errors->first() }}
        </span>
    </div>
@endif
