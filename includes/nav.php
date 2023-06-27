<header role="banner" id="navTop" class="nav flex">

    <div id="navTopLeft">
        <div id="logo" class="logo">
            <a href='/' role='link' tabindex='0'><img src="assets/img/icons/facebook2.svg" alt="" class="pointer"></a>
        </div>
    </div>

    <div id="navTopRight" class="flex">
        <div id="navSearch" class="search flex marginL">
            <div class="search-box">
                <button class="btn-search" onclick="focusSearch()"><i class="fas fa-search"></i></button>
                <input id="input-search" type="text" class="input-search radius1" placeholder="">
            </div>
        </div>

        <?php echo $nav->getNav(); ?>

    </div>

</header>