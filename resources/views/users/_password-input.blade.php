<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            {!! Form::label('password', '*Geslo:') !!}
            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </span>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-lg-6">
            {!! Form::label('password_confirmation', '*Ponovi geslo:') !!}
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>