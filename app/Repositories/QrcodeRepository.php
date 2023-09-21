<?php

namespace App\Repositories;

use App\Models\Qrcode;
use App\Repositories\BaseRepository;

class QrcodeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'website',
        'company_name',
        'product_name',
        'product_url',
        'image_path',
        'callback_url',
        'qrcode_path',
        'amount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Qrcode::class;
    }
}
