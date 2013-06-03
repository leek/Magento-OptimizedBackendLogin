<?php
/**
 * @category    SchumacherFM_OptBeLogin
 * @package     Helper
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class SchumacherFM_OptBeLogin_Helper_Data extends Mage_Core_Helper_Abstract
{

    protected $_versionMapper = array(
        '1.13' => '1.8',
        '1.8'  => '1.8',
        '1.7'  => '1.8',
    );

    const XML_PATH_DOMAIN_PREFIX = 'dev/optbelogin/domain_';

    public function getAutoComplete()
    {
        $off = 'off';
        $on  = 'on';

        if ($this->isDomainArea('local') || $this->isDomainArea('acc')) {
            return $on;
        }

        return $off;
    }

    /**
     * @param string $area [local|acc]
     *
     * @return string
     */
    public function isDomainArea($area = 'local')
    {
        return stristr($_SERVER['HTTP_HOST'], Mage::getStoreConfig(self::XML_PATH_DOMAIN_PREFIX . $area)) !== FALSE;
    }

    /**
     * @return string
     */
    public function getMagentoEdition()
    {
        return 'ce';
    }

    /**
     * @return string
     */
    public function getMagentoVersion()
    {
        $versionInfo = Mage::getVersionInfo();
        $version     = $versionInfo['major'] . '.' . $versionInfo['minor'];
        return isset($this->_versionMapper[$version]) ? $this->_versionMapper[$version] : '1.8';
    }

    /**
     * @return bool
     */
    public function getDisableForgotPasswordLink()
    {
        return Mage::getStoreConfigFlag('dev/optbelogin/disable_forgot_password_link');
    }

    /**
     * @return bool
     */
    public function getDisableLogo()
    {
        return Mage::getStoreConfigFlag('dev/optbelogin/disable_logo');
    }

    /**
     * @return bool
     */
    public function getFormColor()
    {
        return Mage::getStoreConfig('dev/optbelogin/form_color');
    }

}