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
    
    case 'delete':
        if (!empty($_GET['fid'])) {
            delete_facture($_GET['fid']);
            if(!empty($_GET['cid'])) {
                header('Location: /?data=client&action=view&cid='.$_GET['cid'], true, 301); 
            } else {
                header('Location: /?data=facture&action=list', true, 301); 
            }
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;

    case 'view':
        if (!empty($_GET['fid'])) {
            $produits = get_all_produits();
            $facture = get_facture($_GET['fid']);
            $facprods = get_fac_prod($_GET['fid']);
            if (!empty($facture)) {
                print_view('factures/single', ['facture' => $facture, 'produits' => $produits, 'facprods' => $facprods]);
            die;
            }
        }
        print_view('404');
        break;

    case 'add_pdt':
        if (!empty($_POST['pid']) && !empty($_POST['fid']) && !empty($_POST['q-produit'])) {
            $set=is_prod($_POST['fid'], $_POST['pid']);
            if(!empty($set)) {
                add_quantite($_POST['fid'],$_POST['pid'],$_POST['q-produit']);
            } else {
                link_pdt_fac($_POST['fid'], $_POST['pid'], $_POST['q-produit']);
            }
            header('Location: /?data=facture&action=view&fid='.$_POST['fid'], true, 301); 
        } else {
            die('Remplissez le formulaire !');
        }
    break;

    case 'delete_pdt':
        if (!empty($_GET['id'])) {
            delete_fac_prod($_GET['id']);
            header('Location: /?data=facture&action=view&fid='.$_GET['fid'], true, 301); 
            
        } else {
            die('L\'identifiant client est obligatoire !');
        }
        break;

    default:
    print_view('404');
}