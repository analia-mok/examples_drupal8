# Example 1 - Basic Skeleton

## Preparing Your Module

To get started with a custom module, you will first need a name. As defined in the
[official Drupal documentation](https://www.drupal.org/docs/creating-custom-modules/naming-and-placing-your-drupal-module#s-name-your-module),
your name must follow these rules:

* It must __start__ with a letter.
* It must contain __only lower-case letters__ and __underscores__.
* It must __not__ contain __any spaces__.
* It must __not__ be __longer than 50 characters__.
* It must be __unique__. Your module should not have the same short name as any other module, theme,
theme engine, or installation profile you will be using on the site.
* It should __NOT__ be any of the reserved terms: `src`, `lib`, `vendor`, `assets`, `css`, `files`,
`images`, `js`, `misc`, `templates`, `includes`, `fixtures`, `Drupal`.

Once you have a name determined,

1. Create a folder with that name, AND
2. Within that folder, create a file with the same name and with the `.info.yml` extension.

So for example, if your module's name is `my_awesome_module`, you will have the following folder structure:

```
my_awesome_module/
  my_awesome_module.info.yml
```

Next, you will need to define the following attributes in your `.info.yml`

* name
* description
* type
* package
* core_version_requirement __OR__ core

See this module's `.info.yml` for values and formatting.

* __Name__ - The human readable label for your module.
* __Description__ - A short description of what your module accomplishes.
* __Type__ - In our case, will just be equal to `module`. For themes, this would `theme`. For installation profiles, `profile`.
* __Package__ - Think of as a "category" to group your custom modules under. Commonly labelled as "Custom" or the name of your Drupal project/site, but can be anything human-readable.
* For project's built on Drupal 8.7.7 or higher, you can use the `core_version_requirement` key to say that your module is compatible with some version of Drupal higher than 8.7 and 9. e.g. `^8.8 || ^9`.
* If your project is a version of Drupal earlier than 8.7.7, you will have to use the `core` key. E.g. `core: 8.x`.

And that's it :tada: Drupal can recognize your module. A little boring, but this is the minimum
amount of files you need when it comes to registering a module.

### Related Resources

* Related Drupal 8 Official Docs:
  * [Naming and Placing Your Module](https://www.drupal.org/docs/creating-custom-modules/naming-and-placing-your-drupal-module)
  * [More on .info.yml](https://www.drupal.org/docs/creating-custom-modules/let-drupal-know-about-your-module-with-an-infoyml-file)
  * [Basic Module Structure](https://www.drupal.org/docs/creating-custom-modules/basic-structure)

## Other Basic Files

### composer.json
Even if you are not using a composer-based project, you will often see a `composer.json` file in
contributed modules. Similar to how an `info.yml` is required to allow Drupal to recognize your
module, a `composer.json` is required to allow composer to recognize your module as a composer
package. However, this file is NOT required.

This file is only required if you either:

1. Plan to publish your module to drupal.org OR
2. Plan to pull down your module via composer by some other means. (e.g. via [repositories](https://getcomposer.org/doc/05-repositories.md))

### .module

Very commonly, you will at least have a `.module` file in your module so that you can run what are
called [hooks](https://drupalize.me/tutorial/what-are-hooks?p=2766). The attached tutorial will go
in more in-depth with what hooks are and what they can do; however in short, hooks allow you
to __alter and/or extend__ Drupal's default behavior.

### .install

If you find the need to run some kind of automated task right after your module is enabled or
some form of "update" task, you can implement hooks here. Most commonly,

* `hook_install()` - https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Extension%21module.api.php/function/hook_install/8.9.x
* `hook_update_N()` - https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Extension%21module.api.php/function/hook_update_N/8.9.x

There are other hooks categorized as installation or upgrade hooks, but these are the most common
two that you will use on a more regular basis.

### Related Resources

* Related Drupal 8 Official Docs:
  * [Adding a composer.json](https://www.drupal.org/docs/creating-custom-modules/add-a-composerjson-file)
* [What Are Hooks](https://drupalize.me/tutorial/what-are-hooks?p=2766)
* [Available Drupal ^8.7 and ^9.0 Hooks](https://api.drupal.org/api/drupal/core%21core.api.php/group/hooks/8.9.x)