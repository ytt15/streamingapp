<!-- User Id Field -->
    {!! Form::hidden('user_id', auth::user()->id, ['class' => 'form-control', 'required']) !!}

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'https://' ,'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Product Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_url', 'Product Url:') !!}
    {!! Form::text('product_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Image Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Image Path:') !!}
    {!! Form::file('image_path', null, ['class' => 'form-control-file', 'accept' => '.jpg, .png']) !!}
</div>

<!-- Callback Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('callback_url', 'Callback Url:') !!}
    {!! Form::text('callback_url', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Qrcode Path Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('qrcode_path', 'Qrcode Path:') !!}
    {!! Form::text('qrcode_path', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'required']) !!}
</div>