CREATE TABLE tx_publications_domain_model_publication (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bibtype varchar(255) DEFAULT '' NOT NULL,
	type varchar(255) DEFAULT '' NOT NULL,
	citeid varchar(255) DEFAULT '' NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	title text NOT NULL,
	abstract text NOT NULL,
	journal varchar(255) DEFAULT '' NOT NULL,
	date int(11) DEFAULT '0' NOT NULL,
	volume varchar(255) DEFAULT '' NOT NULL,
	number varchar(255) DEFAULT '' NOT NULL,
	number2 varchar(255) DEFAULT '' NOT NULL,
	pages varchar(255) DEFAULT '' NOT NULL,
	affiliation varchar(255) DEFAULT '' NOT NULL,
	note varchar(255) DEFAULT '' NOT NULL,
	annotation varchar(255) DEFAULT '' NOT NULL,
	keywords text NOT NULL,
	tags text NOT NULL,
	file_url varchar(255) DEFAULT '' NOT NULL,
	web_url varchar(255) DEFAULT '' NOT NULL,
	web_url_date varchar(255) DEFAULT '' NOT NULL,
	web_url2 varchar(255) DEFAULT '' NOT NULL,
	miscellaneous varchar(255) DEFAULT '' NOT NULL,
	miscellaneous2 varchar(255) DEFAULT '' NOT NULL,
	editor varchar(255) DEFAULT '' NOT NULL,
	publisher varchar(255) DEFAULT '' NOT NULL,
	series varchar(255) DEFAULT '' NOT NULL,
	address text NOT NULL,
	edition varchar(255) DEFAULT '' NOT NULL,
	chapter varchar(255) DEFAULT '' NOT NULL,
	extern tinyint(4) unsigned DEFAULT '0' NOT NULL,
	reviewed tinyint(4) unsigned DEFAULT '0' NOT NULL,
	in_library tinyint(4) unsigned DEFAULT '0' NOT NULL,
	borrowed_by varchar(255) DEFAULT '' NOT NULL,
	howpublished varchar(255) DEFAULT '' NOT NULL,
	event_name varchar(255) DEFAULT '' NOT NULL,
	event_place varchar(255) DEFAULT '' NOT NULL,
	language varchar(255) DEFAULT '' NOT NULL,
	booktitle text NOT NULL,
	organization varchar(255) DEFAULT '' NOT NULL,
	school varchar(255) DEFAULT '' NOT NULL,
	institution varchar(255) DEFAULT '' NOT NULL,
	institute varchar(255) DEFAULT '' NOT NULL,
	isbn varchar(255) DEFAULT '' NOT NULL,
	issn varchar(255) DEFAULT '' NOT NULL,
	doi varchar(255) DEFAULT '' NOT NULL,
	authors int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY language (l10n_parent,sys_language_uid)
);

CREATE TABLE tx_publications_domain_model_author (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	first_name varchar(255) DEFAULT '' NOT NULL,
	last_name varchar(255) DEFAULT '' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY language (l10n_parent,sys_language_uid)
);

CREATE TABLE tx_publications_publication_author_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);