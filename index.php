<?php
include __DIR__ . '/partials/header.php';
$filter_hotel = $hotels;
function filter_parking($item)
{
    $park = $_GET['park'];
    return $item['parking'] == $park || $park === 'all';
}
if (isset($_GET['park'])) {
    $filter_hotel = array_filter($filter_hotel, 'filter_parking');
    // var_dump($filter_hotel);
}

function filter_vote($item)
{
    $vote = $_GET['vote'];
    return $item['vote'] >= $vote || $vote === 'all';
}
if (isset($_GET['vote'])) {
    $filter_hotel = array_filter($filter_hotel, 'filter_vote');
}

?>

<main class="container">
    <?php
    // var_dump($hotels);
    ?>
    <table class="table">
        <thead>
            <tr>
                <?php
                $array_key = array_keys($hotels[0]);
                foreach ($array_key as $hotel) {
                    $string = ucfirst(str_replace('_', ' ', $hotel)); ?>
                    <th scope="col"><?php echo $string ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($filter_hotel) > 0) {
                foreach ($filter_hotel as $hotel) { ?>
                    <tr>
                        <th scope="row"><?php echo $hotel['name'] ?></th>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php if ($hotel['parking']) { ?>
                                Yes
                            <?php } else if (!$hotel['parking']) { ?>
                                No
                            <?php } ?>
                        </td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</main>

<?php
include __DIR__ . '/partials/footer.php';
?>