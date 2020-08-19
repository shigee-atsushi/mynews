<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>編集画面</title>
    </head>
    <body>
        <h1>編集画面</h1>
        @extends('layouts.admin')
        @section('title', 'プロフィールの編集')
        @section('content')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>編集</h2>
                        <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $Profiles_form->name }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender" rows="20" value="{{ $Profiles_form->gender }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="hobby" value="{{ $Profiles_form->hobby }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">自己紹介欄</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="introduction" rows="20" value="{{ $Profiles_form->introduction }}"></textarea>
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $Profiles_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profiles_form->profilelogs !=NULL)
                                @foreach ($profiles_form->profilelogs as $profilelog)
                                <li class="list-group-item">{{$profilelog->edited_id }}</li>
                                @endforeach
                            @endif    
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>
</html>