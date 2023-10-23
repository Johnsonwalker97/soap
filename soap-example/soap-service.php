<?php
// soap-service.php

$options = [
    'uri' => 'urn:SoapService',
];

$wsdl = 'http://localhost/soap-example/soap-service.wsdl.xml';

$server = new SoapServer($wsdl, $options);

class SoapService

{
    public function getData($param)
    {
       
 $host = '127.0.0.1';
        $db   = 'tpsoap';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
    
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);

            // Recherchez le produit dans la base de données par le paramètre
            $stmt = $pdo->prepare("SELECT * FROM products WHERE product_code = :product_code");
            $stmt->bindValue(':product_code', $param);
            $stmt->execute();
       
            if ($stmt === false) {
                print_r($pdo->errorInfo()); // Affiche les détails de l'erreur
                die('Query failed.');
            }

            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si le produit existe, retournez les données
            if ($product) {
                $data = [
                    'product_code' => $product['product_code'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                ];

                return $data;
            } else {
                // Si le produit n'est pas trouvé, retournez un message d'erreur
                return ['error' => 'Product not found'];
            }
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }


 public function getAllProducts()
    {
        $host = '127.0.0.1';
        $db   = 'tpsoap';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
    
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);

            // Sélectionner tous les produits de la base de données
            $stmt = $pdo->query("SELECT * FROM products");

            // Récupérer tous les produits sous forme d'un tableau
            $products = $stmt->fetchAll();

            return $products;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }


public function Deleteproducts($param)
{
    $host = '127.0.0.1';
    $db   = 'tpsoap';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        // Supprimer le produit de la base de données
        $stmt = $pdo->prepare("DELETE FROM products WHERE product_code = :product_code");
        $stmt->bindValue(':product_code', $param);
        $stmt->execute();

        if ($stmt === false) {
            print_r($pdo->errorInfo()); // Affiche les détails de l'erreur
            die('Query failed.');
        }

        // Vérifier si des lignes ont été affectées (c'est-à-dire si le produit existait)
        if ($stmt->rowCount() > 0) {
            return ['message' => 'Produit supprimé avec succès'];
        } else {
            return ['error' => 'Produit non trouve'];
        }
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

public function Insert($data)
{
    $host = '127.0.0.1';
    $db   = 'tpsoap';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        // Insérer le produit dans la base de données
        $stmt = $pdo->prepare("INSERT INTO products (product_code, name, price) VALUES (:product_code, :name, :price)");
        $stmt->bindValue(':product_code', $data['product_code']);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':price', $data['price']);
        $stmt->execute();

        if ($stmt === false) {
            print_r($pdo->errorInfo()); // Affiche les détails de l'erreur
            die('Query failed.');
        }

        return ['message' => 'Produit inséré avec succès'];
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

public function Update($data)
{
    $host = '127.0.0.1';
    $db   = 'tpsoap';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);

        // Update the product in the database
        $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price WHERE product_code = :product_code");
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':price', $data['price']);
        $stmt->bindValue(':product_code', $data['product_code']);
        $stmt->execute();

        if ($stmt === false) {
            print_r($pdo->errorInfo()); // Display error details
            die('Query failed.');
        }

        return ['message' => 'Produit mis à jour avec succès'];
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

}

$server->setClass('SoapService');
$server->handle();
?>
