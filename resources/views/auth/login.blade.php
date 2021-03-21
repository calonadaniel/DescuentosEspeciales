
<!DOCTYPE html>
<html lang="es">
    <head>
        @include('components.head')
        @include('components.styles')
    </head>

    <body>
        <div class="section" >
            <div class="container text-center py-5">
                <img  style="max-width:auto;
                height:40%" src="./img/login.png" alt="">
            </div>
        </div>
        {{--@include('components.navbar') --}}
        <div class="section pt-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header text-center" style = "font-size:22px">{{ __('Descuentos Especiales') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember"  style="font-size:0.9em">
                                                    {{ __('Recuerdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-12 offset-md-4 ">
                                            <button type="submit" class="btn btn-acceder">
                                                {{ __('Acceder') }}
                                            </button>
                                        </div>
                                        {{--<div class="col-12 offset-md-4 mt-1">
                                            @if (Route::has('password.request'))
                                            <a class="" style="font-size:0.9em" href="{{ route('password.request') }}">
                                                {{ __('Restablecer Contraseña') }}
                                            </a>
                                        @endif 
                                        </div>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--@include('components.footer')--}}
        {{--@include('components.scripts'--}}
    </body>
</html>


