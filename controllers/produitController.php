<?php
switch ($_GET['action']) {
    case 'add':
        if ((!empty($_POST['nom-produit'])) || (!empty($_POST['tva-produit'])) || (!empty($_POST['prix-produit'])) || (!empty($_POST['unite-produit']))) {
            create_produit($_POST['nom-produit'],$_POST['tva-produit'],$_POST['prix-produit'],$_POST['unite-produit']);
            header('Location: /?data=produit&action=list', true, 301);               
        } else {
            die('Remplissez le formulaire !');
        }
    break;

    case 'delete':
        if (!empty($_GET['pid'])) {
            delete_produit($_GET['pid']);
            header('Location: /?data=produit&action=list', true, 301); 
        } else {
            die('L\'identifiant produit est obligatoire !');
        }
        break;
        
    case 'list':
        $produits=get_all_produits();
        print_view('produits/list', ['produits'=>$produits]);
        break;

    case 'view':
        if (!empty($_GET['pid'])) {
            $produit = get_produit($_GET['pid']);
            if (!empty($produit)) {
                print_view('produits/single', ['produit' => $produit]);
            die;
            }
        }
        print_view('404');
        break;

    case 'edit':
        if (!empty($_POST['pid']) && !empty($_POST['produit_name'])) {
            edit_produit($_POST['pid'],$_POST['produit_name'],$_POST['tva-produit'],$_POST['prix-produit'],$_POST['unite-produit']);
            header('Location: /?data=produit&action=view&pid='.$_POST['pid'], true, 301);
        } else {
            die('L\'identifiant produit est obligatoire !');
        }
        break;
        
    default:
    print_view('404');
}