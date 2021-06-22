@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <table class="table table-bordered">
        <tr>
            <th>Data</th>
            <th>Kategoria</th>
            <th>Kwota</th>

        </tr>
        @foreach ($billings ?? '' as $billing)
        <tr>
            <td>{{ $billing->date }}</td>
            <td>{{ $billing->category->name }}</td>
            <td>{{ $billing->price }}</td>

            <td>
                <a class="nav-link" href="{{ route('billings.show',$billing->id) }}">Show</a>
                <a class="nav-link" href="{{ route('billings.edit',$billing->id) }}">Edit</a>
                <form action="{{ route('billings.destroy',$billing->id) }}" method="POST">

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