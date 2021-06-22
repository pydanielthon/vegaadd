@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <table class="table table-bordered">
            <tr>
                <th>Firma</th>
                <th>Email</th>
            </tr>
            @foreach ($contrahents ?? '' as $contrahent)
            <tr>
                <td>{{ $contrahent->name }}</td>
                <td>{{ $contrahent->email }}</td>
                <td>
                     <a class="nav-link" href="{{ route('contrahents.show',$contrahent->id) }}">Show</a>
                        <a class="nav-link" href="{{ route('contrahents.edit',$contrahent->id) }}">Edit</a>
                    <form action="{{ route('contrahents.destroy',$contrahent->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="nav-link">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
