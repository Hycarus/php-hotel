<?php
include __DIR__ . '/partials/header.php';
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
            <?php foreach ($hotels as $hotel) { ?>
                <tr>
                    <th scope="row"><?php echo $hotel['name'] ?></th>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php if ($hotel['parking']) { ?>
                            Yes
                        <?php } else { ?>
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