@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if(!empty($worker))

                <p>{{$worker->name}} {{$worker->surname}}</p>
                <p>{{$worker->price}}</p>
                <p>{{$worker->address}}</p>
                <p>{{$worker->notes}}</p>
                @include('hours.show', ['hours' => $worker->hours, 'id' => $worker->id])
                <p>Nie rozliczone godziny <span id="unpaid_hours">{{$unpaid_hours ?? ''}}
                </span>  od <span id="unpaid_hours_from">{{$hours_unpaid_from ?? ''}}
                </span> do <span id="unpaid_hours_to " >{{$hours_unpaid_to ?? ''}}</span></p>
                <p>Rozliczenie godzin do dnia (włącznie)</p>
                <form method="POST">
                    <input type="date" class="form-control" name="date" id="inputDateToPaid" placeholder="">
                    <button id="paid_worker">Rozlicz</button>
                </form>
                <button id="print_worker">Drukuj Rozliczenie</button>
                <input type="date" class="form-control" name="date" id="inputPaidDateFrom" placeholder="">
                <input type="date" class="form-control" name="date" id="inputPaidDateTo" placeholder="">
                <button id="paidButton">Pokaż</button>

                <input type="date" class="form-control" name="date" id="inputHourDateFrom" placeholder="">
                <input type="date" class="form-control" name="date" id="inputHourDateTo" placeholder="">
                <button id="hourButton">Pokaż</button>

           @endif
    </div>
@endsection
