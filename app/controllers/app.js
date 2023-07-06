$(document).ready(function() {
    var previousPath = getCurrentPath();
    var mainLeftLoaded = false;
    var scrollPositions = {}; // Object to store scroll positions

    // Initial page load
    deleteCachedPage(getCurrentPath());
    loadMain(getCurrentPath());

    // Handle navigation clicks
    $('body').on('click', 'a', function(event) {
        event.preventDefault();
        var link = $(this).attr('href');

        if (link.indexOf('href:') > -1) {
            window.open(link.replace('href:', ''), '_blank');
        } else {
            if (link !== getCurrentPath()) {
                saveScrollPosition(); // Save the scroll position before loading a new page
                loadMain(link);
                updateURL(link);
                closeHash();
            } else {
                deleteCachedPage(link);
                loadMain(link);
            }
        }
    });

    // Load page content based on current URL
    function loadMain(path, skipCache) {
        // Load or close the left menu based on the new page
        loadMainLeft(path);
        
        // Check if page content is cached and caching is not skipped
        if (!skipCache && !isProfilePage(path)) {
            var cachedContent = getCachedPage(path);
            if (cachedContent) {
                displayPage(cachedContent);
                restoreScrollPosition(path); // Restore the scroll position after loading the cached page
                return;
            }
        }

        // Update previousPath before making the AJAX request
        previousPath = path;

        // Fetch page content from the server
        var url = 'app/controllers/load_page.php?page=' + path + '&username=' + getUsernameFromPath(path) + '&hashtag=' + getHashtagFromPath(path);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                cachePage(path, response);
                displayPage(response);
                restoreScrollPosition(path); // Restore the scroll position after loading the new page
            },
            error: function() {
                alert('Error loading page.');
            }
        });

    }

    // Check if the given path is a profile page
    function isProfilePage(path) {
        return /^\/@([A-Za-z0-9_]+)$/.test(path);
    }

    // Get the username from the path
    function getUsernameFromPath(path) {
        var username = '';

        // Extract the username from the path
        var pathParts = path.split('/');
        if (pathParts.length >= 3) {
            username = pathParts[2];
        }

        return username;
    }

    // Get the hashtag from the path
    function getHashtagFromPath(path) {
        var hashtag = '';

        // Extract the hashtag from the path
        var pathParts = path.split('/');
        if (pathParts.length >= 2) {
            hashtag = pathParts[1];
        }

        return hashtag;
    }

    // Load or close the left menu based on the path
    function loadMainLeft(path) {
        var includeMainLeft = shouldLoadMainLeft(path);

        if (includeMainLeft && !mainLeftLoaded) {
            displayMainLeft();
        } else if (!includeMainLeft && mainLeftLoaded) {
            closeMainLeft();
        }
    }

    // Determine if the left menu should be loaded based on the path
    function shouldLoadMainLeft(path) {
        if (path === '/login' || path === '/register') {
            return false;
        }
        return true;
    }

    // Load the left menu
    function displayMainLeft() {
        var leftMenuURL = 'app/views/main/left_menu.php';
        $.ajax({
            url: leftMenuURL,
            type: 'GET',
            success: function(response) {
                $('#mainLeft').html(response);
                mainLeftLoaded = true; // Set the flag to indicate that the left menu has been loaded
            },
            error: function() {
                alert('Error loading left menu.');
            }
        });
    }

    // Close the left menu
    function closeMainLeft() {
        $('#mainLeft').empty();
        mainLeftLoaded = false;
    }

    // Cache page content
    function cachePage(path, content) {
        sessionStorage.setItem(path, content);
    }

    function deleteCachedPage(path) {
        sessionStorage.removeItem(path);
    }

    // Get cached page content
    function getCachedPage(path) {
        return sessionStorage.getItem(path);
    }

    // Display page content
    function displayPage(content) {
        $('#mainCenter').html(content);
    }

    // Get the current path from the URL
    function getCurrentPath() {
        var path = location.pathname;
        return path;
    }

    // Update the URL using the History API
    function updateURL(path) {
        var newURL = path; // Updated URL format
        history.pushState(null, '', newURL);
    }

    // Save the scroll position for the current page
    function saveScrollPosition() {
        var path = getCurrentPath();
        scrollPositions[path] = $(window).scrollTop();
    }

    // Restore the scroll position for the specified path
    function restoreScrollPosition(path) {
        if (scrollPositions.hasOwnProperty(path)) {
            $(window).scrollTop(scrollPositions[path]);
        } else {
            $(window).scrollTop(0); // Scroll to the top if no scroll position is stored
        }
    }

    // Handle hash links
    function handleHashLink() {
        var hash = location.hash;
        if (hash !== '') {
            var link = hash.replace("#", "");
            openHash(link);
        } else {
            closeHash();
        }
    }

    // Handle hash links
    function openHash(link) {
        var hashParts = link.split("/");
        if (hashParts.length === 2) {
            var page = hashParts[0];
            var id = hashParts[1];
            eval("openModal('" + page + "', " + id + ", false)");
        }
    }

    // Handle hash links
    function closeHash() {
        closeModal(false);
    }

    // Handle browser back/forward button
    $(window).on("popstate", function(event) {
        var path = getCurrentPath();
        if (path !== previousPath) {
            loadMain(path, true); // Skip caching on browser back/forward
            previousPath = path;
        }
        loadMainLeft(path);
        handleHashLink();
    });

    // Handle hash links on initial page load
    handleHashLink();
});
