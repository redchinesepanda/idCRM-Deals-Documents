<?php

namespace idcrmdeals\includes;

// use idcrmdeals\includes\actions\idCRMDealsActionLanguage;

class idCRMDealsRoles
{
	public static function activate()
	{
		self::add_cap();
	}

    public static function add_cap_deal( $roles )
    {
        foreach ( $roles as $role ) {
            $role->add_cap( 'create_idrcm_deals' );

            $role->add_cap( 'read_idrcm_deals' );

            $role->add_cap( 'read_private_idrcm_deals' );

            $role->add_cap( 'edit_idrcm_deals' );

            $role->add_cap( 'edit_others_idrcm_deals' );
            
            $role->add_cap( 'edit_published_idrcm_deals' );
            
            $role->add_cap( 'publish_idrcm_deals' );

            $role->add_cap( 'delete_idrcm_deals' );

            // $role_admin->add_cap( 'create_companies' );
            // $role_admin->add_cap( 'read_companies' );
            // $role_admin->add_cap( 'read_private_companies' );
            // $role_admin->add_cap( 'edit_companies' );
            // $role_admin->add_cap( 'edit_others_companies' );
            // $role_admin->add_cap( 'edit_published_companies' );
            // $role_admin->add_cap( 'publish_companies' );
            // $role_admin->add_cap( 'delete_companies' );
        }
    }

    public static function add_cap_deal_status( $roles )
    {
        foreach ( $roles as $role ) {
            $role->add_cap( 'edit_idrcm_deal_status' );
        }
    }

    public static function add_cap()
    {
        $roles = [];
        
        if ( wp_roles()->is_role( 'administrator' ) ) {
            $roles[] = get_role( 'administrator' );
        }

        if ( wp_roles()->is_role( 'crm_manager' ) ) {
            $roles[] = get_role( 'crm_manager' );
        }

        if ( wp_roles()->is_role( 'crm_support' ) ) {
            $roles[] = get_role( 'crm_support' );
        }

        self::add_cap_deal( $roles );
        
        self::add_cap_deal_status( $roles );

        // wp_die( '<pre>idCRMDealsRoles::add_cap $roles: ' . print_r( $roles, true ) . '</pre>' ); 
    }

}

?>