Sparky
======
A simple log notifier using SMTP. Sparky fetches *only* yesterday's log and sends an email to you. If you decide to run the cron job more than once, you will get the same email.

Configuration
==============
- Open up config.inc.php and add your SMTP configuration in.
```
<?php
/* Mailer Settings */
$_config['mailer_host']     = 'ssl://smtp.writersky.com';              
$_config['mailer_port']     = 465;                                     // 465 for SSL
$_config['mailer_username'] = 'sparky@writersky.com';                  // The user you want to send as
$_config['mailer_password'] = 'helloworld!';                           // The user password 

$_config['log_dir'] = '';
$_config['recipient']       = 'support@writersky.com';                  //The user to receive this mail
?>
```
- Create a cron job that runs nightly. 

Contributing
============
Please open up a ticket and submit changes through pull requests. Log title "sparky-#: title", and a brief summary on what the changes are.


Authors
=======
Harris Wong (https://github.com/harriswong)

Copyright and license
======================
Copyright 2013 Writersky

Licensed under The GNU Lesser General Public License, version 2.1 (LGPL-2.1); you may not use this work except in compliance with the License. You may obtain a copy of the License in the LICENSE file, or at:

http://opensource.org/licenses/lgpl-2.1.php

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.

