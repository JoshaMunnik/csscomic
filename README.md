# CSS Comic site

## Introduction

This is a website to teach HTML styling using comics. The site allows users to create an account,
work through lessons, and create their own comics using HTML and CSS. The site also includes an
administrator interface to manage the users.

## Requirements

- PHP 8.2+
- MySql 4.9+
- Composer
- Node.js 
- npm

## Installation

- Copy the project to your server to the folder that contains the website root folder.
- Adjust the rights for the folders `/csscomic/tmp` and `/csscomic/logs`
  and their subfolders.
- Change to `/csscomic/` folder
- run `composer install`
- run `npm install`
- Rename `/csscomic/config/app_local-example.php` to 
  `/csscomic/config/app_local.php` and update the salt, database, email and other settings.
- Create the MySql database and import the `/database/csscomic.sql` file to create the tables.
- Visit the webpage at `/account/login` and register a new user.
- With a database management tool set the `administrator` field to `1` for the newly created user 
  in the `users` table.

The folder `/public_html/` must be accessible via the web. To use a different name, rename the 
folder and also update the `/csscomic/config/paths.php` file accordingly.
 
## Technologies

The project uses the following technologies:
- [CakePhp 5.x](https://cakephp.org/)
- [Batman and Robin styling by Alvar Montoro](https://alvaromontoro.com/blog/68056/batman-comic-css)
- [Ultra Force Html helper](https://github.com/JoshaMunnik/uf-html-helpers/)
- [CodeMirror 6.x](https://codemirror.net/6/)
- [Rollup](https://rollupjs.org/)
- [TypeScript](https://www.typescriptlang.org/)

The project uses local copies of the libraries.

## Database

The database uses uuid for the primary keys. 

To improve the stability the database defines foreign key relationships between the tables. 

## Localization

To add a new language some knowledge about php is required. There is no need to change the code, 
but some texts are placed into php strings or contain small php code snippets.

The localization is split into two parts: a `.po`/`.pot` file for short sentences and words. And
php files for longer texts.

To add a language perform the following steps:
1. Add a new entry to the `LANGUAGES` array in the `Language` class, found at 
   `/csscomic/src/Model/Constant/Language.php`.
2. Create a folder using the iso code of the language in the 
   `/csscomic/resources/locales/` folder.
3. Add a `default.po` file to the created folder using the 
   `/csscomic/resources/locales/default.pot`. To create a `po` file, one can 
   use [Poedit](https://poedit.net/). When translating, do keep the `{0}` and `**` unchanged in the texts.
4. Create a folder using the iso code of the language in the `/public_html/css/` folder.
5. Copy the css files from the `/public_html/css/en/` folder to the created folder. Translate the
   style names (optional).
6. Create a folder using the iso code of the language in the 
   `/csscomic/template/element/content/` folder.
7. Copy the all the subfolders from the `/csscomic/template/element/content/en/` folder to the 
   created folder and translate all the files therein. 

## License

The project is licensed under the GNU GPL-3.0 license. See the [gnu-gpl-v3.0.md](gnu-gpl-v3.0.md) file 
for more information.