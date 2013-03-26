<?php
/*************************************************************************
 * Sparky
 * https://github.com/writersky/Sparky
 * Copyright 2013 Writersky.
 *
 * Licensed under the The GNU Lesser General Public License,
 * version 2.1 (LGPL-2.1).
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://opensource.org/licenses/lgpl-2.1.php
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **************************************************************************
 * Sparky the log notifier. Sends email on error log, or 
 * anything subicious, your call.
 *                                                                      
 * @author  Harris Wong                                                 
 * @date    Mar 25th, 2013                                              
 *************************************************************************/
define('WS_INCLUDE_PATH', '');

//Load custom configuration into the system
require_once('config.inc.php');
global $_config;
define('MAILER_HOST',           $_config['mailer_host']);
define('MAILER_PORT',           $_config['mailer_port']);
define('MAILER_USERNAME',       $_config['mailer_username']);
define('MAILER_PASSWORD',       $_config['mailer_password']);
define('RECIPIENT',             $_config['recipient']);
define('LOG_DIR',               $_config['log_dir']);
define('SENDER_NAME',           $_config['sender_name']);

// Load SMTP/phpMailer libraries
require_once('phpMailer/class.phpmailer.php');
require_once('phpMailer/class.smtp.php');

// Load our controller
require_once('MailerManager.class.php');

// Code starts here.
$subject = 'Logs for ' . date('M d, Y', strtotime('-1 day'));
$log_filename = LOG_DIR . 'sparky_log.txt';

//check if there is a log file
$log = "";
$body = "";
if (file_exists($log_filename)) {
    $log = trim(file_get_contents($log_filename));
    if ($log == "" || $log === false) {
        // no log, empty log, nothing to send. 
        //echo "Nothing sent.";
        exit;
    }
    $body = "Generated on " . date("F j, Y, g:i a") . ":
    
========== LOGS ARE BELOW THIS LINE ==========
" . $log . "
================= LOGS ENDS. =================";
}

$sparky = new MailerManager();
$sparky->smtpmailer(RECIPIENT, MAILER_USERNAME, SENDER_NAME, $subject, $body);
//echo "Log sent.";
exit;
?>
