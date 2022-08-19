<?php
/*
* Header template
*
* @package Aquila
*/
  $menu_object = \AQUILA_THEME\Inc\Menus::get_instance();
  $header_menu_id = $menu_object->get_menu_id( 'aquila-header-menu' );

  $header_menu_items = wp_get_nav_menu_items( $header_menu_id );
    //   Array
    // (
    //     [0] => WP_Post Object
    //         (
    //             [ID] => 141
    //             [menu_item_parent] => 0
    //             [url] => http://localhost/local/home/
    //             [title] => Home
    //         )

    //     [1] => WP_Post Object
    //         (
    //             [ID] => 138
    //             [menu_item_parent] => 0
    //             [url] => http://localhost/local/about/
    //             [title] => About
    //         )

    //     [2] => WP_Post Object
    //         (
    //             [ID] => 140
    //             [menu_item_parent] => 138
    //             [url] => http://localhost/local/gallery/
    //             [title] => Gallery
    //         )
    //     ...

    // )
?>
<nav class="navbar navbar-expand-lg bg-light">

    <div class="container-fluid">

        <?php
      if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
      }
    ?>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php
        if ( ! empty( $header_menu_items ) && is_array( $header_menu_items )) {
      ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
          foreach ( $header_menu_items as $menu_item ) {
            $child_item_children = $menu_object->get_child_menu_items($header_menu_items, $menu_item->ID);

            $has_children = ! empty ( $child_item_children ) && is_array ( $child_item_children );

            if (! $has_children) { 
        ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                        <?php echo esc_html( $menu_item->title ); ?>
                    </a>
                </li>
                <?php
          } else {
        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo esc_url( $menu_item->url ); ?>" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo esc_html( $menu_item->title ); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                foreach ( $child_item_children as $child_item ) {
              ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo esc_url( $child_item->url ); ?>">
                                <?php echo esc_html( $menu_item->title ); ?>
                            </a>
                        </li>

                        <?php
                  }
                  ?>
                    </ul>
                    <?php
                }
              ?>
                </li>
                <?php
          }
        ?>
            </ul>
            <?php
        }
      ?>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>

    </div>

</nav>