<?php

function bdd_connect () {
    $bdd = new PDO('mysql:host=localhost;dbname=factures_tiw', 'root', '');
    return $bdd;
}

function create_client (string $name) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO clients (name) VALUES (:name)');
    $request->execute([
        ':name' => $name
    ]);
}

function get_all_clients () {
    // récupérer tous les clients en bdd
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM clients');
    $request->execute();
    return $request->fetchAll();
}

function get_client (int $id) {
    // récupérer tous les clients en bdd
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
    return $request->fetch();
}

function delete_client (int $id) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM clients WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
}

function edit_client (int $id, string $name) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE clients SET name = :name WHERE id = :id');
    $request->execute([
        ':id'  => $id,
        ':name' => $name,
    ]);
}

function create_produit (string $name, float $tva, float $prix, string $unite) {

    //securite
    $allowed_tva = ['5.5', '20'];
    if(!in_array($tva,$allowed_tva)) {
        $tva = '20';
    }

    $allowed_unite = ['unité', 'h', 'm²'];
    if(!in_array($unite,$allowed_unite)) {
        $unite = 'unité';
    }

    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO produits VALUES (:name, :tva, :prix, :unite)');
    $request->execute([
        ':name' => $name,
        ':tva' => $tva,
        ':prix' => $prix,
        ':unite' => $unite
    ]);
}