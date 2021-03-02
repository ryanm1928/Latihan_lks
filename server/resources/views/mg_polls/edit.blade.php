@extends('layouts.base')

@section('content')
    <h3>tambah Poll</h3>
    <div class="mb-4">
        <form method="GET">
        <div>
            <label for="">Jumlah Pilihan</label> <br>
            <input type="number" min="1" name="choicenum" value="{{ $choicenum }}" >
            <input type="hidden" name="changechoice" value="1">
            <button type="submit">Lanjut</button>
        </div>
        </form>
    </div>
    
    <div>
        <form action="{{ route('manage-polls.update', ['manage_poll'=>$poll->id]) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $poll->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $poll->description) }}" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" class="form-control"value="{{ old('deadline', date('yy-m-d', strtotime($poll->deadline))) }}"  required>
        </div>
        <div>
            <h4>Choices</h4>
            @if(isset($_GET['changechoice']))
            @for($i = 0; $i < $_GET['choicenum']; $i++)
            <div class="form-group">
                <label >Pilihan {{ $i+1 }}</label>
                <input type="text" name="choice[$i]" class="form-control" required>
            </div>
            @endfor
            @else
            @foreach($poll->choices as $key => $choice)
            <div class="form-group">
                <label >Pilihan {{ $key+1 }}</label>
                <input type="text" name="choice[$key]" class="form-control" value="{{ $choice->choice }}" required>
            </div>
            @endforeach
            @endif
        </div>

        <button type="submit">Submit</button>
        </form>
    </div>
@endsection