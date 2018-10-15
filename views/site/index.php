<?php



$db =  Db::getConnection();

$sql = 'SELECT peoples.id as peoples_id, peoples.* , realty_peoples.*, realty.address FROM peoples
   LEFT JOIN realty_peoples ON peoples.id = realty_peoples.id_peoples
  LEFT JOIN realty ON realty_peoples.id_realty = realty.id
  ORDER BY peoples.id';

$sql2 = 'SELECT * FROM ';

$result = $db->prepare($sql);

$result->execute();

$result = $result->fetchAll(PDO::FETCH_ASSOC);

debug($result);

?>




<table border="1px solid black">
    <?php foreach($result as  $value): ?>


    <tr>
        <td><?=$value['id']?></td>
        <td><?= $value['F_name']?></td>
        <td><?=$value['L_name']?></td>
        <td><?=$value['Middle_name']?></td>
        <td><?=$value['birthday']?></td>
        <td><?=$value['id_peoples']?></td>
        <td><?=$value['id_realty']?></td>
        <td><?=$value['type']?></td>
        <td><?=$value['address']?></td>




    </tr>
    <?php endforeach ?>

</table>


<h3>Hello beach</h3>
