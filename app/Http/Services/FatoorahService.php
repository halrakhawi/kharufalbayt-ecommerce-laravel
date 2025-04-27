<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request;
use Redirect;

class FatoorahService{
    private $base_url;
    private $headers;
    private $request_client;

    public function __constructor(Client $request_client){
        $this->request_client=$request_client;
        $this->base_url=env('fatoorah_url');
        $this->headers=[
            'Content-Type'=>'application/json',
            'authorization'=>'Bearer '. env('fatoorah_token')
        ];

    }

    private function buildRequest($data=[]){

        $response = Http::withHeaders([
            'Content-Type'=>'application/json',
            'authorization'=>'Bearer h3lXsAslj4wUcsh5EERZoibv6WjicSJPadrOoxe6iZmn_xkiDZFhd5o6cXKt73hlqc0Wsslghcwg_6b4rreMFnnLtdcfCsVGrbwsoalq6qJeGZ-meMLsDBS4KFU45_TXdTYNKZJKJp1ayMFouFgh8y0JEAwgjd0tHg8XKd2ZB66grcKp1msHG3HSSdj_Hov8yQ141ryfBMSSrByzQAcvcTneyUQ4CQYlu0qI6jLVSTaw0iV4cUI-TDKkh2QCu43aPxUA3xoIyOtfulxboCsdPSoQBI3rDeCKlTsa65gNuHfpFAguj1Ai5LsGBQssjm4C-ATrxTaSZQcrEnDl_eGHfJ-vOkpYhfldwfxKyyVi_-BKmC98CB4nbTaQDf1o_Wgz0SPS84_Rzp3IjdQRjWc4dsnbnPwrs8J_zojMojFaet_lo6SGJc3j0rCVZy7TPP8cFO22cneG-ZlQXTLjMajx1oj7v-I13DWgtcJvbn180eqWNoomCwg-yb4neGF89yCGVITH2BeFt-zNZiQDqHG9u_nkaJ-rC1GE8Kl4XCwpWRAUYNi_ornlh66Mg1NQYdvYlkww0576QsFIxAoWL0uRxprJuNj1cFenPn6RmBLl0JB2I4Np5LxlJNc9B0USxF80HL8Lk-9U4hkAI3cEiIVg1ZKL_CdY_iNKa5PCxU6a-28r0qTO-OLc1noccGhZEs-6T_nZZNIGenGZiPR6mq7qoJ2mmLkdOLj7brEIXifn-bEH7cqj'//. env('fatoorah_token')
        ])->post('https://api-sa.myfatoorah.com/v2/SendPayment',$data);

            if(!$response->successful()){
                return redirect()->route('onlineerror');
            }
            
            $response=json_decode($response,true);
            return Redirect::to($response['Data']['InvoiceURL']);
    }

    public function sendPayment($data){
       return $response=$this->buildRequest($data);

    }



}