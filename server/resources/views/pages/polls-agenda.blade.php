@extends('layouts.base')

@section('content')
    <h4>Agenda polling Anda</h4>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <table class="table table-stripped table-bordered mt-5">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($polls as $key => $poll)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$poll->title}}</td>
                    <td>{{$poll->description}}</td>
                    <td>{{date('d-m-Y', strtotime($poll->deadline))}}</td>
                    <td>
                        @if($poll->votes->count() > 0) 
                        <a href="{{ route('user-polls.result', ['poll'=>$poll->id]) }}" class="btn btn-sm btn-success">Hasil</a>
                        @else
                        <a href="{{ route('user-polls.take', ['poll'=>$poll->id]) }}" class="btn btn-sm btn-primary">Take Poll</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection