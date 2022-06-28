@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Article Detail</h2>
                </div>
                <div class="card">
                    <div class="card-header">{{$article->title}}</div>

                    <div class="card-body">
                        {{$article->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
