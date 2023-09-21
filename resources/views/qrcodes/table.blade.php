<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="qrcodes-table">
            <thead>
            <tr>
                <th>User Id</th>
                <th>Website</th>
                <th>Company Name</th>
                <th>Product Name</th>
                <th>Product Url</th>
                <th>Image Path</th>
                <th>Callback Url</th>
                <th>Qrcode Path</th>
                <th>Amount</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($qrcodes as $qrcode)
                <tr>
                    <td>{{ $qrcode->user_id }}</td>
                    <td><a href="{{ $qrcode->website }}" target="_blank" rel="noopener noreferrer">{{ $qrcode->website }}</a> </td>
                    <td>{{ $qrcode->company_name }}</td>
                    <td>{{ $qrcode->product_name }}</td>
                    <td><a href="{{ $qrcode->product_url }}" target="_blank" rel="noopener noreferrer">{{ $qrcode->product_url }}</a></td>
                    <td><img src="{{ asset($qrcode->image_path) }}" width="200px" ></td>
                    <td><a href="{{ $qrcode->callback_url }}" target="_blank" rel="noopener noreferrer">{{ $qrcode->callback_url }}</a> </td>
                    <td><img src="{{ asset($qrcode->qrcode_path) }}" width="200px" ></td>
                    <td>{{ $qrcode->amount }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['qrcodes.destroy', $qrcode->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('qrcodes.show', [$qrcode->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('qrcodes.edit', [$qrcode->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $qrcodes])
        </div>
    </div>
</div>
