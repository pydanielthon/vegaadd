<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('workers.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-user"></i>
        <p>Pracownicy</p>
    </a>
    <a class="nav-link" href="{{ route('workers.create') }}"> Dodaj pracownika</a>

</li>
<li class="nav-item">
    <a href="{{ route('contrahents.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-users"></i>
        <p>Kontrahenci</p>
    </a>
    <a class="nav-link" href="{{ route('contrahents.create') }}"> Dodaj kontrahenta</a>
</li>

<li class="nav-item">
    <a href="{{ route('hours.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-business-time"></i>
        <p>Godziny</p>
    </a>
    <a class="nav-link" href="{{ route('hours.create') }}"> Dodaj godziny</a>
</li>
<li class="nav-item">
    <a href="{{ route('billings.index') }}" class="nav-link active">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>Rozliczenia</p>
    </a>

    <a class="nav-link" href="{{ route('billings.create') }}"> Dodaj rozliczenie</a>

</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>Raporty</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>Użytkownicy</p>
    </a>
</li>
