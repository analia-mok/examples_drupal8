# Examples - Drupal 8/9

This repo aims to give examples to beginning Drupal developers so that they can:

1. Become more comfortable navigating a custom Drupal 8/9 module
2. Become aware of the various APIs available to them
3. Gain understanding of what makes a module tick.

## How To Use

Under the `modules` directory, there will be several other submodules named based on what
they aim to teach you. Each submodule will contain their own `README` - **which you should read first**.
These READMEs should serve as a guided tour/lesson to help you understand what the the submodule accomplishes.
All code will also be well documented.

You may install this module in your own Drupal project (please not a production project) and then
enable each individual submodule as you are reading through.

Once you feel comfortable with the examples featured here, check out the [Examples For Developers](https://www.drupal.org/project/examples)
module found on drupal.org.

## Editor Setup

I personally use VSCode as my primary editor so I have included an example `.vscode` directory containing
an `extensions.json` and a `settings.json`. The `extensions.json` contains all of the extensions I have
installed and enabled related to PHP/Drupal development. To install them, open the extensions panel and
type `@recommended` in the search bar. You may need to copy the `extensions.json` to the root of your
project or open this project in a separate editor to get the recommendations to appear.

The `settings.json` is configured to use PHPCS and PHPCBF for code linting and auto-formatting. I
personally do not have auto-formatting enabled on save because it would often cause VSCode to crash.
Instead, I have auto-formatting keybinded to Option+F (Alt+F for windows users). These settings assume
that you have [Drupal Coder](https://www.drupal.org/docs/contributed-modules/code-review-module/installing-coder-sniffer)
installed in your project and that you have phpcbf installed globally.

You will need the following packages installed via composer:

* dealerdirect/phpcodesniffer-composer-installer
* squizlabs/php_codesniffer
* drupal/coder

Note: The above is not required for your VSCode setup, but may be helpful.

## Modules

1. Example 01 - Basic Skeleton
2. Example 02 - Basic Forms (WIP)
3. Example 03 - Where You Can Use Your Forms (TBD)

Other Examples To Be Written (TBD):
* How Form can be used
  * Somewhere, somehow show how to use templates.
* Custom Block
* Custom Controller/Routing - As CRUD as can be
* Custom Services
