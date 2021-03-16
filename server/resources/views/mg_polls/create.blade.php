@extends('layouts.base')

@section('content')
    <h3>tambah Poll</h3>
    <div class="mb-4">
        <form method="GET">
        <div>
            <label for="">Jumlah Pilihan</label> <br>
            <input type="number" min="1" name="choicenum" value="{{ $_GET['choicenum'] ?? '' }}" >
            <button type="submit">Lanjut</button>
        </div>
        </form>
    </div>
    @if(isset($_GET['choicenum']))
    <div>
        <form action="{{ route('manage-polls.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>
        <div>
            <h4>Choices</h4>
            @for($i = 0; $i < $_GET['choicenum']; $i++)
            <div class="form-group">
                <label >Pilihan {{ $i+1 }}</label>
                <input type="text" name="choice[]" class="form-control" required>
            </div>
            @endfor
        </div>

        <div>
            <h4>Divisions</h4>
            @foreach($divisions as $key => $division)
            <div class="input-group">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" name="division[]" value="{{ $division->id }}" aria-label="Checkbox for following text input">
                  </div>
                <label class="control-label">Divisi {{ $division->name }}</label>
                {{-- <input type="text" class="form-control" aria-label="Text input with checkbox">
                <input type="checkbox" name="division[]" value="{{$division->id}}" class="form-control" required>
                <label >Divisi {{ $division->name }}</label> --}}
            </div>
            @endforeach
        </div>

        <button type="submit">Submit</button>
        </form>
    </div>
    @endif
@endsection