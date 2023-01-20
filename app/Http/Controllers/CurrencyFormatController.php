<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class CurrencyFormatController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $amount = $this->moneyFormat(100000);
        print($amount);
        
        $amount = $this->moneyFormat(200000);
        print($amount);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function moneyFormat($amount)
    {
        return '$' . number_format($amount);
    }
}
