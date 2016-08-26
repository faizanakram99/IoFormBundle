This is [Fork](https://github.com/hansallis/IoFormBundle) of [IoFormBundle](https://github.com/ioalessio/IoFormBundle) compatible with Symfony 2.8 and above.

A set of Form Types for symfony2 framework using JQuery

How to Install
==============
 1. Add the following to your `composer.json` file
        

        {
            "repositories": [
                {
                    "type": "git",
                    "url": "https://github.com/faizanakram99/IoFormBundle"
                }
            ],
            "require": {
                    "Io/FormBundle": "@dev"
            }
        }      


 2. Run `php composer.phar update` from root of your Symfony project.

 3. Add the twig form configuration `io_form: ~`
