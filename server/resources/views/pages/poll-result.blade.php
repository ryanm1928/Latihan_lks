@extends('layouts.base')

@section('stylesheets')
    <style>
        .list-group-item:hover {
            background-color: rgb(47, 160, 204);
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="text-center">
        <h4 class="lead">Hasil Polling</h4>
        <h5 class="display-3">{{ $poll->title }}</h5>

        <div class="list-group">
            @foreach ($poll->choices as $choice)
            <div class="list-group-item pilihan" data-id="{{ $choice->id }}"> {{ $choice->choice }} </div>
            @endforeach            
        </div>

    </div>
    
@endsection

@section('scripts')
    <script>
    
    </script>
@endsection