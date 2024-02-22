<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
</head>
<body>
<h1 style="border-color: #849460; border-style:solid;
border-width: 2px; border-radius: 10px;">Merci {{ $mailData['Nom'] }} d'avoir passée commande chez nous !</h1>
<p>Nom: {{ $mailData['Nom'] }}</p>
<p>Heure de retrait : {{ $mailData['HeureRetrait'] }}</p>
<p>Code de retrait: {{ $mailData['Code'] }}</p>
<h1>Détails de la commande</h1>
<?php $prixTotal = 0 ?>
@foreach($mailData['Produit']->composer as $contenuCommande)
    <p>Produit : {{ $contenuCommande->produit['NOM_PRODUIT'] }}</p>
    <p>Prix : {{ $contenuCommande->produit->stocker->pluck('PRIX')->first() }}</p>
    <?php $prixTotal += $contenuCommande->produit->stocker->pluck('PRIX')->first() ?>

@endforeach
<p>Prix totale de la commande : {{ $prixTotal }} €</p>
</body>
</html>



