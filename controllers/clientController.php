<?php

switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-client'])) {
            create_client($_POST['nom-client']);
            header('Location: /?data=client&action=list', true, 301);               
        } else {
            die('Le nom du client est obligatoire !');
        }
    break;

    case 'delete':
        if (!empty($_GET['cid'])) {
            delete_client($_GET['cid']);
            header('Location: /?data=client&action=list', true, 301); 
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;

    case 'list':
        $clients=get_all_clients();
        print_view('clients/list', ['clients'=>$clients]);
        break;

    case 'view':
        if (!empty($_GET['cid'])) {
            $factures=get_factures($_GET['cid']);
            $client = get_client($_GET['cid']);
            if (!empty($client)) {
                print_view('clients/single', ['client' => $client, 'factures'=>$factures]);
            die;
            }
        }
        print_view('404');
        break;

    case 'edit':
        if (!empty($_POST['cid']) && !empty($_POST['client_name'])) {
            edit_client($_POST['cid'],$_POST['client_name']);
            header('Location: /?data=client&action=view&cid='.$_POST['cid'], true, 301);
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;
        
    default:
    print_view('404');
}