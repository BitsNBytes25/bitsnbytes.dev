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

	'extras' => [
		'cms-search' => [],
		'cms-icon' => [],
		'cms-button' => [],
		'external-links' => ['icons' => true,],
		'cms-author' => [],
		'cms-pagelist' => [],
		'cms-tags' => [],
		'matomo' => [],
		'active-nav' => [
			'navSelector' => '.site-nav a'
		],
		'prismjs' => ['theme' => 'dark', 'lineNumbers' => true],
		'mastodon-comments' => ['host' => 'social.bitsnbytes.dev'],
        'fslightbox' => [],
	],
];
