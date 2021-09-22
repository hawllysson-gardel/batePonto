<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bladeACLDirectives();
    }

    /**
     * Register ACL the blade directives.
     *
     * @return void
     */
    private function bladeACLDirectives()
    {
        // Call to Auth::user()->hasRole.
        Blade::directive('role', function($expression) {
            return "<?php if (Auth::user()->hasRole({$expression})) : ?>";
        });
        Blade::directive('endrole', function($expression) {
            return "<?php endif; // Auth::user()->hasRole ?>";
        });

        // Call to Auth::user()->can.
        Blade::directive('permission', function($expression) {
            return "<?php if (Auth::user()->can({$expression})) : ?>";
        });
        Blade::directive('endpermission', function($expression) {
            return "<?php endif; // Auth::user()->can ?>";
        });

        // Call to Auth::user()->ability.
        Blade::directive('ability', function($expression) {
            return "<?php if (Auth::user()->ability({$expression})) : ?>";
        });
        Blade::directive('endability', function($expression) {
            return "<?php endif; // Auth::user()->ability ?>";
        });
    }
}
