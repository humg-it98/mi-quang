<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{

    public function setGateAndPolicyAccess()
    {
        $this->defineAboutGate();
        $this->defineGalleryGate();
        $this->defineMenuGate();
        $this->definePostCategoryGate();
        $this->defineProductGate();
        $this->defineProcategoriesGate();
        $this->definePostGate();
        $this->defineRoleGate();
        $this->defineSliderGate();
        $this->defineUserGate();


    }

    public function defineAboutGate()
    {
        Gate::define('about-list', 'App\Policies\AboutPolicy@view');

        Gate::define('about-add', 'App\Policies\AboutPolicy@create');

        Gate::define('about-edit', 'App\Policies\AboutPolicy@update');

        Gate::define('about-del', 'App\Policies\AboutPolicy@delete');
    }

    public function defineGalleryGate()
    {
        Gate::define('galleries-list', 'App\Policies\GalleryPolicy@view');

        Gate::define('galleries-add', 'App\Policies\GalleryPolicy@create');

        Gate::define('galleries-edit', 'App\Policies\GalleryPolicy@update');

        Gate::define('galleries-delete', 'App\Policies\GalleryPolicy@delete');
    }

    public function defineMenuGate()
    {
        Gate::define('menu-list', 'App\Policies\MenuPolicy@view');

        Gate::define('menu-add', 'App\Policies\MenuPolicy@create');

        Gate::define('menu-edit', 'App\Policies\MenuPolicy@update');

        Gate::define('menu-del', 'App\Policies\MenuPolicy@delete');
    }

    public function defineProductGate()
    {
        Gate::define('products-list', 'App\Policies\ProductPolicy@view');

        Gate::define('products-add', 'App\Policies\ProductPolicy@create');

        Gate::define('products-edit', 'App\Policies\ProductPolicy@update');

        Gate::define('products-del', 'App\Policies\ProductPolicy@delete');
    }

    public function defineProcategoriesGate()
    {
        Gate::define('procategories-list', 'App\Policies\ProductCategoryPolicy@view');

        Gate::define('procategories-add', 'App\Policies\ProductCategoryPolicy@create');

        Gate::define('procategories-edit', 'App\Policies\ProductCategoryPolicy@update');

        Gate::define('procategories-del', 'App\Policies\ProductCategoryPolicy@delete');
    }

    public function definePostGate()
    {
        Gate::define('post-list', 'App\Policies\PostPolicy@view');

        Gate::define('post-add', 'App\Policies\PostPolicy@create');

        Gate::define('post-edit', 'App\Policies\PostPolicy@update');

        Gate::define('post-del', 'App\Policies\PostPolicy@delete');
    }

    public function definePostCategoryGate()
    {
        Gate::define('postcategories-list', 'App\Policies\postCategoryPolicy@view');

        Gate::define('postcategories-add', 'App\Policies\postCategoryPolicy@create');

        Gate::define('postcategories-edit', 'App\Policies\postCategoryPolicy@update');

        Gate::define('postcategories-del', 'App\Policies\postCategoryPolicy@delete');
    }

    public function defineSliderGate()
    {
        Gate::define('slider-list', 'App\Policies\SliderPolicy@view');

        Gate::define('slider-add', 'App\Policies\SliderPolicy@create');

        Gate::define('slider-edit', 'App\Policies\SliderPolicy@update');

        Gate::define('slider-del', 'App\Policies\SliderPolicy@delete');
    }

    public function defineRoleGate()
    {
        Gate::define('role-list', 'App\Policies\RolePolicy@view');

        Gate::define('role-add', 'App\Policies\RolePolicy@create');

        Gate::define('role-edit', 'App\Policies\RolePolicy@update');

        Gate::define('role-del', 'App\Policies\RolePolicy@delete');
    }

    public function defineUserGate()
    {
        Gate::define('user-list', 'App\Policies\UserPolicy@view');

        Gate::define('user-add', 'App\Policies\UserPolicy@create');

        Gate::define('user-edit', 'App\Policies\UserPolicy@update');

        Gate::define('user-del', 'App\Policies\UserPolicy@delete');
    }
}
