Require
======

- Composer

How to install
========

Clone the repository

```
git clone https://github.com/AdFabConnect/drupal-fuse.git my-project

cd my-project

git submodule update --init --recursive
```

Edit files :

composer.json and change bdd access "root:root" and db name "localhost/drupal-fuse"

```
"drush site-install standard --account-name=admin --account-pass=admin --db-url=mysql://root:root@localhost/drupal-fuse --yes",
```

Edit files :

app/site/local.settings.php

Edit variables :

```
<?php

$bddUser = 'root';
$bddPassword = 'root';
$bddHost = 'localhost';
$bddName = 'test';

$siteName = 'themefuse';
$siteTheme = 'themefuse';
```

Install with composer

```
composer install
```
