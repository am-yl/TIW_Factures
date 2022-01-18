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

// PRODUITS

function create_produit (string $name, float $tva, float $prix, string $unite) {

    //securite
    $allowed_tva = ['5.5', '20'];
    if(!in_array($tva,$allowed_tva)) {
        $tva = '20';
    }

    $allowed_unite = ['unité', 'h', 'm²'];
    if(!in_array($unite,$allowed_unite)) {
        $unite = 'unite';
    }

    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO produits (name, tva, prix, units) VALUES (:name, :tva, :prix, :unite)');
    $request->execute([
        ':name' => $name,
        ':tva' => $tva,
        ':prix' => $prix,
        ':unite' => $unite
    ]);
}

function get_all_produits () {
    // récupérer tous les produits en bdd
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM produits');
    $request->execute();
    return $request->fetchAll();
}

function get_produit (int $id) {
    // récupérer tous les produits en bdd
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM produits WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
    return $request->fetch();
}

function delete_produit (int $id) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM produits WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
}

function edit_produit (int $id, string $name, float $tva, float $prix, string $unite) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE produits SET name = :name, tva = :tva, prix = :prix, units = :unite WHERE id = :id');
    $request->execute([
        ':id'  => $id,
        ':name' => $name,
        ':tva' => $tva,
        ':prix' => $prix,
        ':unite' => $unite
    ]);
}