<?php
include __DIR__ . '/partials/header.php';
function filter_parking($item)
{
    $search = $_GET['search'];
    return $item['parking'] == $search || $search === 'all';
}
if (isset($_GET['search'])) {
    $filter_hotel = array_filter($hotels, 'filter_parking');
    // var_dump($hotels);
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
            <?php foreach ($filter_hotel as $hotel) { ?>
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
            <?php } ?>
        </tbody>
    </table>
</main>

<?php
include __DIR__ . '/partials/footer.php';
?>