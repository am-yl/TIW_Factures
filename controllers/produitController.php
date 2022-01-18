<?php
switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-produit'])) {
            create_produit($_POST['nom-produit']);
            header('Location: /?data=produit&action=list', true, 301);               
        } else {
            die('Le nom du client est obligatoire !');
        }
    break;

    case 'delete':
        if (!empty($_GET['cid'])) {
            delete_client($_GET['cid']);
            header('Location: /?data=clients&action=', true, 301); 
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;

    case 'view':
        if (!empty($_GET['cid'])) {
            $client = get_client($_GET['cid']);
            if (!empty($client)) {
                print_view('produits/single', ['client' => $client]);
            die;
            }
        }
        print_view('404');
        break;

    case 'list':
        $clients=get_all_clients();
        print_view('produits/list', ['clients'=>$clients]);
        break;

    case 'edit':
        if (!empty($_POST['client_name']) && !empty($_POST['client_name'])) {
            edit_client($_POST['cid'],$_POST['client_name']);
            header('Location: /?data=client&action=view&cid='.$_POST['cid'], true, 301);
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;
        
    default:
    print_view('404');
}