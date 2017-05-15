@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {{json_encode(\App\Helper\Translate::getPlainKey())}}
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea dir="auto" name="query" class="form-control">@if(isset($query)){!! $query !!}@endif
                                </textarea>
                            </div>
                            @if(isset($content))
                            <div class="form-group">
                                <textarea dir="auto" class="form-control"> {!! $content !!} </textarea>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary form-control">Fix IT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection