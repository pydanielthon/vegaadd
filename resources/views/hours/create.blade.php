@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('hours.store') }}" method="POST">
        @csrf <div class="form-row">

            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect2">Wybierz pracownika</label>
                <select name="workerID" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach ($workers as $worker)

                    <option name="workerName" value="{{$worker->id}}"> {{$worker->name}} {{$worker->surname}}
                    </option>

                    @endforeach

                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect22">Wybierz kontrahenta</label>
                <select name="contrahentID" multiple class="form-control" id="exampleFormControlSelect22">
                    @foreach ($contrahents as $contrahent)
                    <option name="contrahentID" value="{{$contrahent->id}}" id="{{$contrahent->id}}"> {{$contrahent->name}}
                    </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inpurPrice">Data wykonania</label>
                <input type="date" class="form-control" name="work_day" id="inputPrice" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputSalary">Ilość godzin</label>
                <input type="number" class="form-control" name="hours" id="inputSalary" placeholder="">
            </div>
        </div>

        <button type="submit" class="btn center btn-primary">Dodaj</button>
    </form>

</div>
@endsection
