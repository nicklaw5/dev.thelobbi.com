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
            'scope'         => array('email','read_friendlists'),
        ),

        /**
         * Google sign in
         */
        'Google' => array(
            'client_id'     => 'Your Google client ID',
            'client_secret' => 'Your Google Client Secret',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

        /**
         * Twitter sign in
         */
        'Twitter' => array(
            'client_id'     => 'Your Twitter client ID',
            'client_secret' => 'Your Twitter Client Secret',
            // No scope - oauth1 doesn't need scope
        ),  
    )

);