<?php

namespace App\Http\Controllers;
use App\Services\SoapServiceClient;
use Illuminate\Http\Request;
use \SoapClient;


class SoapServiceController extends Controller
{

public function insert(){
    return view('insert-form');
}

    public function fetchData(Request $request)
    {
        $wsdlUrl = 'http://localhost/soap-example/soap-service.php?wsdl';

        $options = [
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

        $soapClient = new SoapClient($wsdlUrl, $options);

        $param = $request->input('param'); // Récupérer le paramètre de la requête

        $result = $soapClient->getData($param);
        
         // Passer les données à la vue
          return view('fetch-data', ['result' => $result]);
    }


    public function allproducts(Request $request)
    {
        $wsdlUrl = 'http://localhost/soap-example/soap-service.php?wsdl';

        $options = [
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

        $soapClient = new SoapClient($wsdlUrl, $options);

        $result = $soapClient->getAllProducts();
        
         // Passer les données à la vue
          return view('form', ['result' => $result]);
    }


    public function delete(Request $request)
    {
        $wsdlUrl = 'http://localhost/soap-example/soap-service.php?wsdl';

        $options = [
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];

        $soapClient = new SoapClient($wsdlUrl, $options);

        $param = $request->input('param'); // Récupérer le paramètre de la requête

    
        $result = $soapClient->Deleteproducts($param);
        
         // Passer les données à la vue
          //return view('form', ['result' => $result]);
          return redirect('/form')->with('success', 'Produit supprimé avec succès.');
          
    }

    public function Insertform(Request $request)
{
    $wsdlUrl = 'http://localhost/soap-example/soap-service.php?wsdl';

    $options = [
        'trace' => true,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
    ];

    $soapClient = new SoapClient($wsdlUrl, $options);

    $data = [
        // Préparez les données d'insertion à envoyer au service SOAP
        'product_code' => $request->input('product_code'),
        'name' => $request->input('name'),
        'price' => $request->input('price'),
       
    ];

    // Appelez le service SOAP pour l'insertion
    $result = $soapClient->Insert($data);
    

    // Rediriger avec un message
    return redirect('/form')->with('success', 'Produit inséré avec succès.');
}

//modifier un produit
public function update(Request $request)
{
    $wsdlUrl = 'http://localhost/soap-example/soap-service.php?wsdl';

    $options = [
        'trace' => true,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
    ];

    $soapClient = new SoapClient($wsdlUrl, $options);

    $data = [
        
        'product_code' => $request->input('product_code'),
        'name' => $request->input('name'),
        'price' => $request->input('price'),
       
    ];

    // Appelez le service SOAP pour l'insertion
    $result = $soapClient->Update($data);
    

    // Rediriger avec un message
    return redirect('/form')->with('success', 'Produit modifié avec succès.');
}



}
