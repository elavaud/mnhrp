<?php return array (
  'admin.hostedJournals' => 'Hosted Sites',
  'admin.settings.journalRedirect' => 'Site redirect',
  'admin.settings.journalRedirectInstructions' => 'Requests to the main site will be redirected to this site. This may be useful if the site is hosting only a single system, for example.',
  'admin.settings.noJournalRedirect' => 'Do not redirect',
  'admin.languages.primaryLocaleInstructions' => 'This will be the default language for the site and any hosted systems.',
  'admin.languages.supportedLocalesInstructions' => 'Select all locales to support on the site. The selected locales will be available for use by all systems hosted on the site, and also appear in a language select menu to appear on each site page (which can be overridden on system-specific pages). If multiple locales are not selected, the language toggle menu will not appear and extended language settings will not be available to sites.',
  'admin.locale.maybeIncomplete' => 'Marked locales may be incomplete.',
  'admin.languages.confirmUninstall' => 'Are you sure you want to uninstall this locale? This may affect any hosted sites currently using the locale.',
  'admin.languages.installNewLocalesInstructions' => 'Select any additional locales to install support for in this system. Locales must be installed before they can be used by hosted journals. See the OJS documentation for information on adding support for new languages.',
  'admin.languages.downloadLocales' => 'Download Locales',
  'admin.languages.downloadFailed' => 'The locale download failed. The error message(s) below describe the failure.',
  'admin.languages.localeInstalled' => 'The "{$locale}" locale has been installed.',
  'admin.languages.download' => 'Download Locale',
  'admin.languages.download.cannotOpen' => 'Cannot open language descriptor from PKP web site.',
  'admin.languages.download.cannotModifyRegistry' => 'Cannot add the new locale to the locale registry file, typically "registry/locales.xml".',
  'admin.auth.ojs' => 'OJS User Database',
  'admin.auth.enableSyncProfiles' => 'Enable user profile synchronization (if supported by this authentication plug-in). User profile information will be automatically updated from the remote source when a user logs in, and profile changes (including password changes) made within OJS will be automatically updated on the remote source. If this option is not enabled OJS profile information will be kept separate from remote source profile information.',
  'admin.auth.enableSyncPasswords' => 'Enable user password modification (if supported by this authentication plug-in). Enabling this option allows users to modify their password from within OJS and to use the OJS "lost password" feature to reset a forgotten password. These functions will be unavailable to users with this authentication source if this option is not enabled.',
  'admin.auth.enableCreateUsers' => 'Enable user creation (if supported by this authentication plug-in). Users created within OJS with this authentication source will be automatically added to the remote authentication source if they do not already exist. Additionally, if this source is the default authentication source, OJS accounts created through user registration will also be added to the remote authentication source.',
  'admin.systemVersion' => 'OJS Version',
  'admin.systemConfiguration' => 'OJS Configuration',
  'admin.systemConfigurationDescription' => 'OJS configuration settings from <tt>config.inc.php</tt>.',
  'admin.journals.journalSettings' => 'Site Settings',
  'admin.journals.noneCreated' => 'No sites have been created.',
  'admin.journals.confirmDelete' => 'Are you sure you want to permanently delete this site and all of its contents?',
  'admin.journals.create' => 'Create Site',
  'admin.journals.createInstructions' => 'You will automatically be enrolled as the manager of this site. After creating a new site, enter it as a manager to continue with its setup and user enrollment.',
  'admin.journals.urlWillBe' => 'This should be a single short word or acronym that identifies the site. The site\'s URL will be {$sampleUrl}',
  'admin.journals.form.titleRequired' => 'A title is required.',
  'admin.journals.form.pathRequired' => 'A path is required.',
  'admin.journals.form.pathAlphaNumeric' => 'The path can contain only alphanumeric characters, underscores, and hyphens, and must begin and end with an alphanumeric character.',
  'admin.journals.form.pathExists' => 'The selected path is already in use by another site.',
  'admin.journals.enableJournalInstructions' => 'Enable this site to appear publicly.',
  'admin.journals.journalDescription' => 'Site description',
  'admin.journal.pathImportInstructions' => 'Existing site path or path to create (e.g., "ojs").',
  'admin.journals.importSubscriptions' => 'Import subscriptions',
  'admin.journals.transcode' => 'Transcode article metadata from ISO8859-1',
  'admin.journals.redirect' => 'Generate code to map OJS 1 URLs to OJS 2 URLs',
  'admin.journals.form.importPathRequired' => 'The import path is required.',
  'admin.journals.importErrors' => 'Importing failed to complete successfully',
  'admin.mergeUsers' => 'Merge Users',
  'admin.mergeUsers.mergeUser' => 'Merge User',
  'admin.mergeUsers.into.description' => 'Select a user to whom to attribute the previous user\'s actions, e.g., submissions, review assignments, etc.',
  'admin.mergeUsers.from.description' => 'Select a user (or several) to merge into another user account (e.g., when someone has two user accounts). The account(s) selected first will be deleted and any submissions, assignments, etc. will be attributed to the second account.',
  'admin.mergeUsers.allUsers' => 'All Enrolled Users',
  'admin.mergeUsers.confirm' => 'Are you sure you wish to merge the selected {$oldAccountCount} account(s) into the account with the username "{$newUsername}"? The selected {$oldAccountCount} accounts will not exist afterwards. This action is not reversible.',
  'admin.mergerUsers.noneEnrolled' => 'No enrolled users.',
); ?>