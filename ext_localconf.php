<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {

        /**
         * Include Frontend Plugins
         */
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.publications',
            'Pi1',
            [
                'Publication' => 'list,resetList'
            ],
            [
                'Publication' => 'list,resetList'
            ]
        );

        /**
         * PageTSConfig
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:publications/Configuration/TsConfig/Page.tsconfig">'
        );
    }
);
