<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Recaptcha extends BaseConfig
{
    /**
     * Site Key
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaSiteKey = '6LcINxUpAAAAAIa3XTS4wcEQdVo6wVuKlstcPfXG';

    /**
     * Secret Key
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaSecretKey = '6LcINxUpAAAAAPpnRjVB_VNDMjOOBbMLF3D-xtB8';

    /**
     * Language
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaLang = 'en';
}
