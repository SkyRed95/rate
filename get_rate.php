<table border="1">
    <tr>
        <th>Код валюты</th>
        <th>Код национальной валюты</th>
        <th class="buy_th">Курс покупки</th>
        <th class="sale_th">Курс продажи</th>
        <th>Дата</th>
    </tr>
    <?php
    $ccy = $_GET['ccy'];
    $range = $_GET['range'];
    $connect = new mysqli("localhost", "SkyRed", "", "rate_db");

    $result = $connect->query("SELECT `Ccy`, `Base_ccy`, `Buy`, `Sale`, `Date` FROM `rate` WHERE `Ccy` LIKE '" . $ccy . "' and
Date >= '" . $range[0] . "' and Date <= '" . $range[1] . "'");
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr class="tr">
            <td><?php echo $row["Ccy"] ?></td>
            <td><?php echo $row["Base_ccy"] ?></td>
            <td><?php echo $row["Buy"] ?></td>
            <td><?php echo $row["Sale"] ?></td>
            <td><?php echo $row["Date"] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
} else {
    echo "Нет данных";
}
$connect->close();