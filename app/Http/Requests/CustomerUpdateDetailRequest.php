<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateDetailRequest extends FormRequest
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
            'price' => 'required|numeric|check_price:\App\Models\Product,'.$this->segment(4).',min_sales_price,min'
        ];
    }

    public function messages()
    {
        $p = Product::find($this->segment(4));
        return [
            'price.check_price' => 'Harga barang '.$p->name.' harus sesuai dengan minimal harga jualnya yaitu '.$p->min_sales_price
        ];
    }
}
