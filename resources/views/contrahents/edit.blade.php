@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Imię</label>
                <input type="text" class="form-control" id="inputName" placeholder="Imię">
              </div>
              <div class="form-group col-md-6">
                <label for="inputSurname">Nazwisko</label>
                <input type="text" class="form-control" id="inputSurname" placeholder="Nazwisko">
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inpurPrice">Stawka</label>
                  <input type="number" class="form-control" id="inputPrice" placeholder="Stawka">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputSalary">Pensja</label>
                  <input type="number" class="form-control" id="inputSalary" placeholder="Pensja">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inpurPrice">Adres</label>
                  <textarea class="form-control" id="inputAddress" rows="3"></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputSalary">Notatki</label>
                  <textarea class="form-control" id="inputNotes" rows="3"></textarea>

                </div>
              </div>
            <button type="submit" class="btn center btn-primary">Dodaj</button>
          </form>

    </div>
@endsection
