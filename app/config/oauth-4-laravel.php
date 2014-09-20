<?php
return array( 

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session', 

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook sign in
         */
        'Facebook' => array(
            'client_id'     => '359013327595412',
            'client_secret' => '5f8508460e2b96ad851303df62381d36',
            'scope'         => array('email', 'user_friends'),
        ),

        /**
         * Google sign in
         */
        'Google' => array(
            'client_id'     => '129498997419-9go19qo6j7hcigc9tf4u4ad09g1eutam.apps.googleusercontent.com',
            'client_secret' => 'rrXY9GUOhVo1LDwmTVdI78se',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

        /**
         * Twitter sign in
         */
        'Twitter' => array(
            'client_id'     => '2499955794-fl4n4tKRtFzCk7J8TCij4aWitTRrss0l9dh6yRd',
            'client_secret' => 'j4Tn5xmb6ueBhIuN9uUXQl0oIcFcwnyMcXdQ9Ard5H8Hl',
            // No scope - oauth1 doesn't need scope
        ),  
    )

);