@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($forms as $form)

    <h3>
        <a href="/forms/{{$form['id']}}">{{$form['form_name']}}</a>
    </h3>

    @endforeach

@endsection
