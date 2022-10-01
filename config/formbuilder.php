<?php
/*--------------------
https://github.com/jazmy/laravelformbuilder
Licensed under the GNU General Public License v3.0
Author: Jasmine Robinson (jazmy.com)
Last Updated: 12/29/2018
----------------------*/
return [
    /**
     * Url path to use for this package routes
     */
    'url_path' => '/form-builder',

    /**
     * Template layout file. This is the path to the layout file your application uses
     */
    'layout_file' => 'layouts.app',

      /**
     * The stack section in the layout file to output js content
     * Define something like @stack('stack_name') and provide the 'stack_name here'
     */
    'layout_js_stack' => 'js',

    /**
     * The stack section in the layout file to output css content
     */
    'layout_css_stack' => 'css',
    /**
     * The class that will provide the roles we will display on form create or edit pages?
     */
    'roles_provider' => restray\FormBuilder\Services\RolesProvider::class,

    'submissions_tags' => [
        'entretient' => ['name' => 'En attente d\'entretien ( RDV DISCORD )', 'color' => 'orange-700 py-2 px-4 rounded-md'],
        'accepted' => ['name' => 'Validé', 'color' => 'green-600 py-2 px-4 rounded-md'],
        'refused' => ['name' => 'Refusé', 'color' => 'red-600 py-2 px-4 rounded-md'],
        'arrived' => ['name' => 'En attente', 'color' => 'gray-600 py-2 px-4 rounded-md'],
    ],

    'user_model' => \App\Models\User::class
];
