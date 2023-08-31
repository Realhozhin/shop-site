@extends('layouts.admin')
@section('title','edit User')
@section('content')
        <section class="row m-0 mt-5">
            <section class="col-12 p-3 bg-gray-400 text-dark">
                {!! Form::model($user,['route'=>['users.update','id'=>$user->id],'method'=>'put']) !!}
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('name','name') !!}
                    {!! Form::text('name',null,['class'=>'form-control','style'=>'bordered:2px inset black']) !!}
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('email','email') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <section class="d-block mt-3 col-md-6 mb-3">
                    {!! Form::label('password','password') !!}
                    {!! Form::text('password',null,['class'=>'form-control']) !!}
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </section>
                <div class="col-md-6 mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Select role</label>
                    <select name="role_as" class="form-control">
                        <option value="">select role</option>
                        <option value="1" {{ $user->role_as == '1' ? 'selected':''}}>Admin</option>
                        <option value="0" {{ $user->role_as == '0' ? 'selected':''}}>User</option>
                    </select>
                    @error('role_as')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <section class="d-block mt-5">
                    {!! Form::submit('update',['class'=>'btn btn-success']) !!}
                </section>
                {!! Form::close() !!}
                <a href="{{route('category.index')}}" class="btn btn-warning mt-2">return back</a>
            </section>
        </section>
@endsection
