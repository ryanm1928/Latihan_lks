@extends('layouts.base')

@section('content')
    <h3>Daftar Poll</h3>
    <a href="{{ route('manage-polls.create') }} "> Tambah </a>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Creator</th>
                    <th>Deadline</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polls as $key => $poll)
                    <tr>
                        <td> {{ $key + 1 }} </td>
                        <td> {{ $poll->title }} </td>
                        <td> {{ $poll->deadline }} </td>
                        <td> {{ $poll->creator->username }} </td>
                        <td>
                            <a href="{{ route('manage-polls.edit', ['manage_poll' => $poll->id] ) }}">Detail</a>
                            <a href="{{ route('manage-polls.edit', ['manage_poll' => $poll->id] ) }}">Edit</a>
                            <button onclick="deleteData({{ $poll->id }})">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="" method="POST" id="theform">
        @csrf
        @method("DELETE")
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function deleteData(id) {
            let con = confirm("Anda yakin akan menghapus data ini? ")
            if(con) {
                let formElement = document.getElementById('theform')
                formElement.setAttribute('action', "{{ route('manage-polls.index') }}/"+id)
                formElement.submit();
            }
        }
    </script>
@endsection