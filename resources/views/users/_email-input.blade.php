<div class="row">
    <div class="form-group">
        {!! Form::label('email', '*E-naslov:', ['class' => 'control-label col-lg-3']) !!}
        <div class="col-lg-9">

            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-at" aria-hidden="true"></i>
                </span>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>