@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('billings.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect2">Wybierz pracownika</label>
                <select name="workerID" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach ($workers as $worker)

                    <option name="workerName" value="{{$worker->id}}"> {{$worker->name}}
                    </option>

                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect22">Wybierz kontrahenta</label>
                <select name="contrahentID" multiple class="form-control" id="exampleFormControlSelect22">
                    @foreach ($contrahents as $contrahent)
                    <option name="contrahentID" value="{{$contrahent->id}}"> {{$contrahent->name}}
                    </option>
                    @endforeach

                </select>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inpurPrice">Kwota</label>
                <input type="number" class="form-control" name="price" id="inputPrice" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inpurPrice">Data </label>
                <input type="date" class="form-control" name="date" id="inputPrice" placeholder="">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputSalary">Notatki</label>
                <textarea class="form-control" name="notes" id="inputNotes" rows="3"></textarea>

            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect22">Wybierz kategorię</label>
                <select name="categoryID" multiple class="form-control" id="exampleFormControlSelect22">
                    @foreach ($category as $cat)
                    <option name="categoryID" value="{{$cat->id}}" id="{{$cat->id}}"> {{$cat->name}}
                    </option>
                    @endforeach

                </select>
            </div>
        </div>
        <button type="submit" class="btn center btn-primary">Dodaj</button>
    </form>

</div>
@endsection