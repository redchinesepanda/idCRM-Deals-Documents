<?php
/**
 * Проверяет роль определенного пользователя.
 * Возвращает true при совпадении.
 *
 * @param  строка $role Название роли.
 * @param  логический $user_id (не обязательный) ID пользователя, роль которого нужно проверить.
 * @return bool
 */

function is_user_role( $role, $user_id = null )
{
  $user = is_numeric( $user_id ) ? get_userdata( $user_id ) : wp_get_current_user();

  if ( !$user ) {
    return false;
  }

  return in_array( $role, (array) $user->roles );
}

$user = wp_get_current_user();

if (
  is_user_role( 'crm_manager', $user->ID )
  || is_user_role( 'administrator', $user->ID )
  || is_user_role( 'shop_manager', $user->ID )
) {

} else {
  wp_safe_redirect( home_url() . '/crm/' );
  
  exit;
}

?>
