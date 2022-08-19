<?php
/**
 *  Register menus
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

class Menus {
    use Traits\Singleton;

    protected function __construct () {
        // load classes
        $this->setup_hooks();
    }

    protected function setup_hooks () {
        // actions
        add_action('init', [$this, 'register_my_menus']);
    }

    public function register_my_menus() {
      register_nav_menus(
        array(
          'aquila-header-menu' => esc_html__( 'Header Menu', 'aquila' ),
          'aquila-footer-menu' => esc_html__( 'Footer Menu', 'aquila' )
         )
       );
     }

    public function get_menu_id( $location ) {
      // get all locations
      $locations = get_nav_menu_locations();
      // Array
      // (
      //     [aquila-header-menu] => 7
      //     [aquila-footer-menu] => 8
      // )

      // get object id by location
      $menu_id = $locations[ $location ]; // 7 or 8

      return ! empty($menu_id) ? $menu_id : '';
    }

    public function get_child_menu_items ( $menu_items, $parent_id ) {
      $child_menus = [];

      if ( ! empty ($menu_items) && is_array ($menu_items) ) {
        foreach ($menu_items as $menu_item) {
          if ( intval ( $menu_item->menu_item_parent ) === $parent_id ) {
            array_push($child_menus, $menu_item);
          }
        }
      }

      return $child_menus;
    }

}