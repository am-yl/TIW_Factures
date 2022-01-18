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

// FACTURES

function create_facture (int $cid, string $name) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO factures (client_id, name) VALUES (:cid, :name)');
    $request->execute([
        ':cid' => $cid,
        ':name' => $name
    ]);
}

function get_all_factures() {
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures');
    $request->execute();
    return $request->fetchAll();
}

function get_factures(int $cid) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures WHERE client_id = :cid');
    $request->execute([
        ':cid' => $cid
    ]);
    return $request->fetchAll();
}

function get_facture(int $id) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
    return $request->fetch();
}

function edit_facture(int $id, string $name) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE factures SET name = :name WHERE id = :id');
    $request->execute([
        ':id'  => $id,
        ':name' => $name
    ]);
}

function delete_facture(int $id) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM factures WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
}

//facture_produit

function link_pdt_fac(int $fid, int $pid, int $pnb) {

    if($pnb <= 0) {
        $pnb = 1;
    }

    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO facture_produit (id_facture, id_produit, quantite) VALUES (:fid, :pid, :pnb)');
    $request->execute([
        ':fid' => $fid,
        ':pid' => $pid,
        ':pnb' => $pnb
    ]);
}

function get_fac_prod(int $fid) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM facture_produit WHERE id_facture = :fid');
    $request->execute([
        ':fid' => $fid
    ]);
    return $request->fetchAll();    
}

function delete_fac_prod(int $id) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM facture_produit WHERE id = :id');
    $request->execute([
        ':id' => $id
    ]);
}

function is_prod(int $fid,int $pid) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM facture_produit WHERE id_produit = :pid AND id_facture=:fid');
    $request->execute([
        ':pid' => $pid,
        ':fid' => $fid
    ]);
    return $request->fetch();
}

function add_quantite(int $fid,int $pid, int $q) {
    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE facture_produit SET quantite = quantite + :q WHERE id_produit = :pid AND id_facture = :fid');
    $request->execute([
        ':q' => $q,
        ':pid' => $pid,
        ':fid' => $fid
    ]);
}

function del_q_neg() {
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM facture_produit WHERE quantite <= 0');
    $request->execute();
}