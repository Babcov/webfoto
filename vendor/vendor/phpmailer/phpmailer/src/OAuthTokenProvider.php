<?php

/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5.5.
 *
 * @see https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 *
 * @author    Marcus Bonito (Synchro/cooler) <phpmailer@synchromedia.co.uk>
 * @author    Jim Jagiellon (jinja) <jimjag@gmail.com>
 * @author    Andy Provost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author    Brent R. Mazel (original founder)
 * @copyright 2012 - 2020 Marcus Bonito
 * @copyright 2010 - 2012 Jim Jagiellon
 * @copyright 2004 - 2009 Andy Provost
 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note      This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

namespace PHPMailer\PHPMailer;

/**
 * OAuthTokenProvider - OAuth2 token provider interface.
 * Provides base64 encoded OAuth2 auth strings for SMTP authentication.
 *
 * @see     OAuth
 * @see     SMTP::authenticate()
 *
 * @author  Peter Scopes (scopes)
 * @author  Marcus Bonito (Synchro/cooler) <phpmailer@synchromedia.co.uk>
 */
interface OAuthTokenProvider
{
    /**
     * Generate a base64-encoded OAuth token ensuring that the access token has not expired.
     * The string to be base 64 encoded should be in the form:
     * "user=<user_email_address>\001auth=Bearer <access_token>\001\001"
     *
     * @return string
     */
    public function getOauth64();
}
