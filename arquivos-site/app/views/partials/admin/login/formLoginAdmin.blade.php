{{ Form::open(['role' => 'form','route' => 'adminLogar.store']) }}
<fieldset>

    <div class="form-group">
        <input class="form-control" placeholder="E-mail" value="{{ Input::old('email') }}" name="email" type="text" autofocus>
        {{ $errors->first('email') }}
    </div>

    <div class="form-group">
        <input class="form-control" placeholder="Password" value="{{ Input::old('password') }}"  name="password" type="password" value="">
        {{ $errors->first('password') }}
    </div>

     {{ Form::submit('Login',['class' =>'btn btn-lg btn-success btn-block']) }}
</fieldset>
{{ Form::close() }}
