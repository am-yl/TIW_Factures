<?php
switch ($_GET['action']) {
    case 'add':
        if (!empty($_POST['nom-facture']) && !empty($_POST['cid'])) {
            create_facture($_POST['cid'], $_POST['nom-facture']);
            header('Location: /?data=facture&action=list', true, 301);               
        } else {
            die('Remplissez le formulaire !');
        }
    break;

    case 'list':
        $factures=get_all_factures();
        $clients=get_all_clients();
        print_view('factures/list', ['factures'=>$factures, 'clients'=>$clients]);
        break;
        
    default:
    print_view('404');
}