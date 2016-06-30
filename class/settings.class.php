<?php
/*
 * LICENSE: CC BY SA
You are free to:

    Share — copy and redistribute the material in any medium or format
    Adapt — remix, transform, and build upon the material
    for any purpose, even commercially.

    The licensor cannot revoke these freedoms as long as you follow the license terms.

Under the following terms:

    Attribution — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.

    ShareAlike — If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.

    No additional restrictions — You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.

Notices:

    You do not have to comply with the license for elements of the material in the public domain or where your use is permitted by an applicable exception or limitation.
    No warranties are given. The license may not give you all of the permissions necessary for your intended use. For example, other rights such as publicity, privacy, or moral rights may limit how you use the material.
*/

/**
 *
 * @author schlender
 */
class Settings {
    # DATABASE SETTINGS LIVE
    const dbHost_live = 'localhost';
    const dbUser_live = 'hhb';
    const dbPass_live = 'hhb123456';
    const dbSchema_live = 'haushaltsbuch';
    const dbPort_live = 3306;
    const dbSock_live = false;
    const dbTablePrefix_live = 'hhb_';
    
    # DATABASE SETTINGS DEV
    const dbHost_dev = 'localhost';
    const dbUser_dev = 'hhb';
    const dbPass_dev = 'hhb123456';
    const dbSchema_dev = 'haushaltsbuch';
    const dbPort_dev = 3306;
    const dbSock_dev = false;
    const dbTablePrefix_dev = 'hhb_';
    
    # LIVE SERVER SETTINGS
    const server_host_live = 'dev.hhb.local';
    const server_domain_live = 'http://dev.hhb.local';
    const server_path_prefix_live = '/var/www/html';
    const server_app_dir_live = 'Haushaltsbuch/';
    
    # DEV SERVER SETTINGS
    const server_host_dev = 'localhost';
    const server_domain_dev = 'http://localhost/Haushaltsbuch';
    const server_path_prefix_dev = '/home/schlender/_workspace/custom/php';
    const server_app_dir_dev = 'Haushaltsbuch/';
    
    
}
