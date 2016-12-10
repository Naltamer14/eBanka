<div class="col-sm-2 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="{{ action('AccountsController@index') }}">Pregled <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Poročila</a></li>
        <li><a href="#">Zgodovina</a></li>
        <li><a href="#">Analiza</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{!! url('transactions/create') !!}">Naredi transakcijo</a></li>
        <li><a href="">Nav item again</a></li>
        <li><a href="">One more nav</a></li>
        <li><a href="">Another nav item</a></li>
        <li><a href="">More navigation</a></li>
    </ul>
</div>