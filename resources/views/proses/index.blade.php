{{--
  -- Index
  -- Layout for proses index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                <h2>Liste des proses</h2>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($proses as $prose)
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    {{$prose->title}}
                                </div>
                                <div class="card-body text-dark">
                                    <ul class="card-text list-unstyled">
                                        @foreach ($prose->verse as $item)
                                            <li class="badge badge-light">{{substr($item->content, 0, 25)}}...</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Cette prose contient : {{count($prose->verse)}} vers</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
