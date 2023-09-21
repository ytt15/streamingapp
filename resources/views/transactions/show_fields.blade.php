<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $transaction->user_id }}</p>
</div>

<!-- Qrcode Owner Id Field -->
<div class="col-sm-12">
    {!! Form::label('qrcode_owner_id', 'Qrcode Owner Id:') !!}
    <p>{{ $transaction->qrcode_owner_id }}</p>
</div>

<!-- Qr Code Id Field -->
<div class="col-sm-12">
    {!! Form::label('qr_code_id', 'Qr Code Id:') !!}
    <p>{{ $transaction->qr_code_id }}</p>
</div>

<!-- Payment Method Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method', 'Payment Method:') !!}
    <p>{{ $transaction->payment_method }}</p>
</div>

<!-- Message Field -->
<div class="col-sm-12">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $transaction->message }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $transaction->amount }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaction->status }}</p>
</div>

