@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <table class="table table-bordered">
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Stawka</th>

            </tr>
            @foreach ($workers ?? '' as $worker)
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->surname }}</td>
                <td>{{ $worker->price_hour }}</td>

                <td>
                     <a class="nav-link" href="{{ route('workers.show',$worker->id) }}">Show</a>
                        <a class="nav-link" href="{{ route('workers.edit',$worker->id) }}">Edit</a>
                    <form action="{{ route('workers.destroy',$worker->id) }}" method="POST">

                        @csrf
                        <input type="hidden" name="_method" value="DELETE">

                        @method('DELETE')
                        <button type="submit" class="nav-link">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
