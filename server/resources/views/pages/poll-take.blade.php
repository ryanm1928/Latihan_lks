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
        <h4 class="lead">Lakukan Polling</h4>
        <h5 class="display-3">{{ $poll->title }}</h5>

        <div class="list-group">
            @foreach ($poll->choices as $choice)
            <div class="list-group-item pilihan" data-id="{{ $choice->id }}"> {{ $choice->choice }} </div>
            @endforeach
            <button type="submit" form="f-poll" class="btn btn-block btn-success mt-5">Kumpulkan Polling</button>
        </div>

        <form action="{{  route('user-polls.submit', ['poll' => $poll->id]) }}" method="POST" id="f-poll">
            @csrf
            <input type="hidden" name="choice" id="choice">
        </form>
    </div>
    
@endsection

@section('scripts')
    <script>
    
        function clearChoice() {
            $('.pilihan').each(function(idx, el) {
                $(el).removeClass('active')
            })
        }

        $('.pilihan').on('click', function(event){            
            clearChoice()
            $(event.target).addClass('active')
            let idChoice = event.target.dataset.id
            $('#choice').attr('value', idChoice)
        })
    </script>
@endsection