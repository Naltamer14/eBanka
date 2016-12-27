@include('users._email-input')

@unless(isset($nopassword))
    @include('users._password-input')
@endunless


<hr>


<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('name', '*Ime:') !!}
            <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-id-card" aria-hidden="true"></i>
                </span>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="col-lg-6">
            {!! Form::label('surname', '*Priimek:') !!}
            <div class="input-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-id-card" aria-hidden="true"></i>
                </span>
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('surname'))
                <span class="help-block">
                        <strong>{{ $errors->first('surname') }}</strong>
                    </span>
            @endif
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
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
            <div class="input-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                </span>
                {!! Form::text('country', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('country'))
                <span class="help-block">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
            @endif
        </div>
        <div class="col-lg-6">
            {!! Form::label('city', '*Mesto:') !!}
            <div class="input-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </span>
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('city'))
                <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('post_number', '*Poštna številka:') !!}
            <div class="input-group{{ $errors->has('post_number') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </span>
                {!! Form::text('post_number', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('post_number'))
                <span class="help-block">
                        <strong>{{ $errors->first('post_number') }}</strong>
                    </span>
            @endif
        </div>
        <div class="col-lg-6">
            {!! Form::label('phone_number', '*Telefonska številka:') !!}
            <div class="input-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('phone_number'))
                <span class="help-block">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
            @endif
        </div>
    </div>
</div>

<br>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>