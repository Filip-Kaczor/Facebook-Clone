<?php
    use models\classes\Nav;

    $nav = new Nav($con, $userLoggedIn);
?>

<header class="nav flex">

    <nav>
        <div id="navTopLeft">

            <?php echo $nav->getNavLeft(); ?>

        </div>

        <div id="navTopCenter">

            <?php echo $nav->getNavCenter(); ?>

        </div>

        <div id="navTopRight" class="flex">

            <?php echo $nav->getNavRight(); ?>

        </div>
    </nav>

</header>