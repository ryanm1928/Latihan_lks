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

        <button type="submit">Submit</button>
        </form>
    </div>
    @endif
@endsection