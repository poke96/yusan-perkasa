<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required|numeric|check_price:\App\Models\Product,'.$this->segment(4).',max_purchase_price,max'
        ];
    }

    public function messages()
    {
        $p = Product::find($this->segment(4));
        return [
            'price.check_price' => 'Harga barang '.$p->name.' harus sesuai dengan maximal harga belinya yaitu '.$p->max_purchase_price
        ];
    }
}
