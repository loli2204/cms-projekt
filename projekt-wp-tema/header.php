<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- För desktopwebbläsare -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">

    <!-- För iOS-enheter -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    
    <!-- För Android-enheter -->
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/94e39a2e70.js" crossorigin="anonymous"></script>
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Hotel Bali Logo">
                </a>
            </div>
            <nav>
                <?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
