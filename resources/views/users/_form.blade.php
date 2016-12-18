<div class="row">
    <div class="form-group">
        {!! Form::label('username', '*Uporabniško ime:', ['class' => 'control-label col-lg-3']) !!}
        <div class="col-lg-9">
            <div class="input-group">
                <i class="input-group-addon fa fa-user" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        {!! Form::label('email', '*E-naslov:', ['class' => 'control-label col-lg-3']) !!}
        <div class="col-lg-9">
            <div class="input-group">
                <i class="input-group-addon fa fa-at" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('password', '*Geslo:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-unlock-alt" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            {!! Form::label('password_confirmation', '*Ponovi geslo:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-lock" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>


<hr>


<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('name', '*Ime:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-id-card" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            {!! Form::label('surname', '*Priimek:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-id-card" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-2">
            {!! Form::label('gender', '*Spol:') !!}
        </div>
        <div class="col-lg-2">
            {!! Form::label('male', 'Moški') !!}
            {!! Form::radio('gender', 0, false, ['id' => 'male']) !!}
        </div>
        <div class="col-lg-2">
            {!! Form::label('female', 'Ženski') !!}
            {!! Form::radio('gender', 1, false, ['id' => 'female']) !!}
        </div>
    </div>
</div>


<hr>


<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('country', '*Država:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-globe" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('country', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            {!! Form::label('city', '*Mesto:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-map-marker" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('post_number', '*Poštna številka:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-home" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('post_number', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            {!! Form::label('phone_number', '*Telefonska številka:') !!}
            <div class="input-group">
                <i class="input-group-addon fa fa-phone" aria-hidden="true" id="basic-addon1"></i>
                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<br>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@include('errors.list')
