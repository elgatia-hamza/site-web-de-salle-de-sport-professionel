<?php
    try{
        $bd = new PDO('mysql:host=localhost;dbname=projet-web;charset=utf8', 'root', '');
    } catch(Exception $e) {
         die('Error : '.$e->getMessage());
    }
        $request_select0 = $bd->query('select * from client where confirmer=0');
        $request_select1 = $bd->query('select * from client where confirmer=1');
        
?>
<style>
.confirmer {
  color: blue;
  font-weight: bold;
  outline: none;
  border: 2px solid blue;
  border-radius: 10px;
}

.confirmer:hover {
  color: #fff;
  background-color: blue;
}

.delete {
  color: red;
  font-weight: bold;
  outline: none;
  border: 2px solid red;
  border-radius: 10px;
}

.delete:hover {
  color: #fff;
  background-color: red;
}

.container h2{
    padding:10px;
    color: #f17808;
}

th{
    font-size:10px !important;
}

.id{
    width: 10px;
}

.nom {
  width: 50px;
}

.prenom{
    width:50px;
}

.sx{
    width:40px;
}

.tele{
    width:60px;
}

.date_naissance{
    width:60px;
}

.number_card{
    width:70px;
}

.expry_date{
    width:50px;
}

.csc{
    width:20px;
}


</style>
<div class="container width_container">
    <h2>Client non confirmer</h2>
    
    <table>
        <th class="id">#</th>
        <th class="nom">Nom</th>
        <th class="prenom">Prenom</th>
        <th class="email">Email</th>
        <th class="sx">Sexe</th>
        <th class="tele">telephone</th>
        <th class="date_naissance">Date naissance</th>
        <?php while($client= $request_select0->fetch()):?>
            <tr>
                <td><input type="text" name="id" class="id" value="<?=$client[0]?>" readonly></td>
                <td><input type="text" name="nom" class="nom" value="<?=$client[1]?>" readonly></td>
                <td><input type="text" name="prenom" class="prenom" value="<?=$client[2]?>" readonly></td>
                <td><input type="text" name="email" class="email" value="<?=$client[3]?>" readonly></td>
                <td><input type="text" name="sexe" class="sx" value="<?=$client[5]?>" readonly></td>
                <td><input type="text" name="telephone" class="tele" value="<?=$client[6]?>" readonly></td>
                <td><input type="text" name="date_naissance" class="date_naissance" value="<?=$client[7]?>" readonly></td>
                <td>
                    <form action="confirmerClient.php" method="post">
                        <input type="hidden" name="id" value="<?=$client[0]?>">
                        <input type="submit" class="confirmer" value="confirmer">
                    </form>
                </td>
                <td>
                    <form action="supprimerClient.php" method="post">
                    <input type="hidden" name="id" value="<?=$client[0]?>">
                        <input type="submit" class="delete" value="supprimer">
                    </form>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
</div>

<div class="container width_container">
    <h2>Client confirmer </h2>
    <table>
        <th class="id">#</th>
        <th class="nom">Nom</th>
        <th class="prenom">Prenom</th>
        <th class="email">Email</th>
        <th class="sx">Sexe</th>
        <th class="tele">telephone</th>
        <th class="date_naissance">Date naissance</th>
        <th class="number_card">number card</th>
        <th class="expry_date">expry date</th>
        <th class="csc">csc</th>
        <?php while($client= $request_select1->fetch()):?>
            <tr>
                <td><input type="text" name="id" class="id" value="<?=$client[0]?>" readonly></td>
                <td><input type="text" name="nom" class="nom" value="<?=$client[1]?>" readonly></td>
                <td><input type="text" name="prenom" class="prenom" value="<?=$client[2]?>" readonly></td>
                <td><input type="text" name="email" class="email" value="<?=$client[3]?>" readonly></td>
                <td><input type="text" name="sexe" class="sx" value="<?=$client[5]?>" readonly></td>
                <td><input type="text" name="telephone" class="tele" value="<?=$client[6]?>" readonly></td>
                <td><input type="text" name="date_naissance" class="date_naissance" value="<?=$client[7]?>" readonly></td>
                <?php $request_carte = $bd->query('SELECT `card_number`, `epiry_date`, `csc` FROM `carte_bancaire` WHERE id_client='.$client[0]);
                    if(!empty($request_carte)){ 
                        $carte = $request_carte->fetch();
                        if(gettype($carte)=="array"){ ?>
                        
                        <td><input type="text" name="number_card" class="number_card" value="<?=$carte[0]?>" readonly></td>
                        <td><input type="text" name="expry_date" class="expry_date" value="<?=$carte[1]?>" readonly></td>
                        <td><input type="text" name="csc" class="csc" value="<?=$carte[2]?>" readonly></td>
                    <?php }else{?>
                        <td><input type="text" name="number_card" class="number_card" value="" readonly></td>
                        <td><input type="text" name="expry_date" class="expry_date" value="" readonly></td>
                        <td><input type="text" name="csc" class="csc" value="" readonly></td>
                    <?php }?>
                <?php }?>
                <td>
                    <form action="supprimerClient.php" method="post">
                        <input type="hidden" name="id" value="<?=$client[0]?>">
                        <input type="submit" class="delete" value="supprimer">
                    </form>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
</div>