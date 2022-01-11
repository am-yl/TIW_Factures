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