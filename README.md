# Torchbearers Akron

This is the website for Torchbearers.

Installation
---------------

### Requirements

This site requires the following dependencies:

- [Local WP](https://localwp.com/)
- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- A [Flywheel](https://getflywheel.com/) Account
- A [GitHub](https://github.com/) Account

### Setup

To fully set the site up locally, follow these steps:

1. Download Local WP, this the tool we use to push and pull information to and from production servers.
2. Ask [Byron Delpinal](mailto:byronddelpinal@gmail.com) to add you as a collaborator on Flywheel, our hosting providor. This will allow you to authenticate for pulling / pushing content.
3. Authenticate with Flywheel from your Local WP instance and do a full "Local Pull" of the site. This will get the site exactly where it is today on your local machine.

This should put you in a place to launch the site locally using the Local WP tool. To edit any of the site's assets locally, you need to use your terminal and navigate to the site's TB theme folder and do the following:

1. Run `composer install` to install the PHP dependencies
2. Run `npm install` to install the JS dependencies

After that, you can run `npm run start` in the theme root, this will watch the files for changes and re-build the site when it sees them.

### Contributing Workflow
Since we will have a few people changing the site, we need to ensure that we're working in a way that will prevent us from stepping on each other's toes. To do that, we have some rules:

1. Content changes are made in production and pulled locally. Never *ever* push the databse from your local machine to production. You can make content and DB changes locally to test things out, of course, but you must then duplicate those changes on production and overwrite your local the next time you pull.
2. Code changes are pushed to production from your local, and always stored in Git. This will ensure that we can always checkout the latest changes, build them, and push them to production without causing an issue.
3. Notify the #project-website channel in Slack when changes are made so people know when to update their local repositories.

### Available CLI commands

This theme comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! Good luck!
