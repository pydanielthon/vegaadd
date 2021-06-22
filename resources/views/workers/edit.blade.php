@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('workers.update', $worker['id']) }}" method="POST" >

            @csrf
            @if(!empty($worker))

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="inputName">Imię</label>
                <input type="text" class="form-control" name="name" id="inputName" value="{{$worker->name}}" placeholder="Imię">
              </div>
              <div class="form-group col-md-5">
                <label for="inputSurname">Nazwisko</label>
                <input type="text" class="form-control" name="surname"  id="inputSurname" value="{{$worker->surname}}" placeholder="Nazwisko">
              </div>
              <div class="form-group col-md-2">
                <label for="inpurPrice">Stawka</label>
                <input type="number" class="form-control" name="price_hour"  id="inputPrice" value="{{$worker->price_hour}}" placeholder="Stawka">
              </div>
            </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inpurPrice">Adres</label>
                  <textarea class="form-control" id="inputAddress" name="address"  rows="3">{{$worker->address}}</textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputSalary">Notatki</label>
                  <textarea class="form-control" id="inputNotes" name="notes"   rows="3">{{$worker->notes}}</textarea>

                </div>
              </div>
              @method('PUT')

            <button type="submit" class="btn center btn-primary">Aktualizuj</button>

          </form>
          @endif

    </div>
@endsection
