@extends('layout')
@section('content')
   <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading">パスワード再発行</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                        @endforeach
                            </div>
                        @endif
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
                            <div class="form-group">
                                <label for="password">新しいパスワード</label>
                                <input type="password" class="form-control {{ $errors->has('password') ? 'incorrect' : '' }}" id="password" name="password" />
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">新しいパスワード（確認）</label>
                                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}" id="password-confirm" name="password_confirmation" />
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- <div class="relative" style="top:18vh">
    <div class="w-max mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl shadow-xl">
        <h1 class="title text-center font-bold">新しいパスワードを設定</h1>
        <div class="text-center text-red-600">
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
            @error('token')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <form method="POST" action="{{ route('update') }}">
            @csrf
            <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
            <div class="input-group">
                <label for="password" class="label font-bold">パスワード</label>
                <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }} w-full border border-gray-400 p-2">
            </div>
            <div class="input-group">
                <label for="password_confirmation" class="label font-bold">パスワードを再入力</label>
                <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }} w-full border border-gray-400 p-2">
            </div>
            <button type="submit" class="w-full mt-3 bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-20">パスワードを再設定</button>
        </form>
    </div>
</div> -->
@endsection