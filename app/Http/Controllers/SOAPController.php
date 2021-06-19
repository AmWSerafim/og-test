<?php

namespace App\Http\Controllers;

use Artisaninweb\SoapWrapper\SoapWrapper;

class SOAPController extends Controller
{
    protected $soapWrapper;

    public function __construct(SoapWrapper $soapWrapper)
    {
        $this->soapWrapper = $soapWrapper;
    }

    public function index(){
        $this->soapWrapper->add('Response', function ($service) {
            $service
                ->wsdl('https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL')
                ->trace(true);
        });
        $response = $this->soapWrapper->call('Response.GetByName');

        $data_array = json_decode(json_encode(simplexml_load_string($response->GetByNameResult->any)), true);

        $filtered_persons = [];
        foreach($data_array['ListByName']['SQL'] as $item){
            if(preg_match('/^[aA]/',$item['Name'])){
                $filtered_persons[] = $item;
            }
        }

        return view("SOAP.index", ["persons" => $filtered_persons]);
    }
}
