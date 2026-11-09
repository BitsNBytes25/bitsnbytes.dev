<?php
/**
 * Theme default settings
 */
return [
	// Type of files to support
	'types' => [
		'pages' => [
			'list' => 'page-list',
			'single' => 'page',
			'sort' => 'title',
			'title' => 'Pages'
		],
		'posts' => [
			'list' => 'post-list',
			'single' => 'post',
			'sort' => 'datetime-r',
			'title' => 'Posts',
			'og:type' => 'article',
		],
		'authors' => [
			'list' => 'author-list',
			'single' => 'author',
			'sort' => 'title',
			'title' => 'Author Pages',
			'og:type' => 'profile',
		],
		'sponsors' => [
			'list' => 'sponsor-list',
			'single' => 'sponsor',
			'sort' => 'random',
			'title' => 'Sponsors',
		]
	],

	// ID of element to attach CMS.js to
	'elementId' => 'cms',

    'icons' => [
        'images/icon.webp',
        'images/logo-32x32.png',
        'images/logo-96x96.png',
        'images/logo-128x128.png',
        'images/logo-144x144.png',
        'images/logo-152x152.png',
        'images/logo-180x180.png',
        'images/logo-192x192.png',
        'images/logo-270x270.png',
        'images/logo-384x384.png',
        'images/logo-512x512.png',
        'images/logo-maskable-192x192.png',
        'images/logo-maskable-512x512.png',
    ],

    'serviceWorker' => true,

    'pwa' => [
        'name'             => 'Bits n Bytes Tech Blog',
        'short_name'       => 'BitsnBytes',
        'display'          => 'standalone',   // or: "browser", "minimalUI", "inline"
        'theme_color'      => '#8B5CF6',
        'background_color' => '#101922',
    ],

	'extras' => [
		'cms-search' => [],
		'cms-icon' => [],
		'cms-button' => [],
		'external-links' => ['icons' => true,],
		'cms-author' => [],
		'cms-pagelist' => [],
		'cms-tags' => [],
		'matomo' => [
            'host' => 'metrics.eval.bz', // No trailing slash, no http(s)://
            'siteId' => 7,                        // Your Matomo Site ID
        ],
		'active-nav' => [
			'navSelector' => '.site-nav a'
		],
		'prismjs' => ['theme' => 'dark', 'lineNumbers' => true],
		'mastodon-comments' => ['host' => 'social.bitsnbytes.dev'],
        'fslightbox' => [],
        'cms-pagination' => [],
        'offline-notification' => [],
	],
];
