<?php
class AlexusListOfTrophies_Listener {
	/**
    * Listen to the "init_dependencies" code event.
    *
    * @param XenForo_Dependencies_Abstract $dependencies
    * @param array $data
    */
    public static function init(XenForo_Dependencies_Abstract $dependencies, array $data)
    {
        //Get the static variable $helperCallbacks and add a new item in the array.
        XenForo_Template_Helper_Core::$helperCallbacks += array(
            'trophieslist' => array('AlexusListOfTrophies_Helpers', 'helperListOfTrophies')
        );
    }
}
?>