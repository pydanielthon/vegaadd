@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('contrahents.store') }}" method="POST">
        @csrf <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nazwa </label>
                <input type="text" class="form-control" name="name" id="inputName" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputSurname">Email</label>
                <input type="email" class="form-control" name="email" id="inputSurname" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inpurPrice">Gotówka</label>
                <input type="number" class="form-control" name="salary_cash" id="inputPrice" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputSalary">Faktura</label>
                <input type="number" class="form-control" name="salary_invoice" id="inputSalary" placeholder="">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputSalary">Notatki</label>
                <textarea class="form-control" name="notes" id="inputNotes" rows="3"></textarea>

            </div>
        </div>
        <button type="submit" class="btn center btn-primary">Dodaj</button>
    </form>

</div>
@endsection