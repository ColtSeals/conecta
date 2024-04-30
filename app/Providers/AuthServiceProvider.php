<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Occurrence;
use App\Policies\OccurrencePolicy;
use App\Models\Permission;
use App\Policies\PermissionPolicy;
use App\Models\Battalion;
use App\Policies\BattalionPolicy;
use App\Models\Branch;
use App\Policies\BranchPolicy;
use App\Models\Nature;
use App\Policies\NaturePolicy;
use App\Models\Question;
use App\Policies\QuestionPolicy;
use App\Models\Role;
use App\Policies\RolePolicy;
use App\Models\Tree;
use App\Policies\TreePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Occurrence::class => OccurrencePolicy::class,
        Permission::class => PermissionPolicy::class,
        Battalion::class => BattalionPolicy::class,
        Question::class => QuestionPolicy::class,
        Nature::class => NaturePolicy::class,
        Branch::class => BranchPolicy::class,
        Tree::class => TreePolicy::class,
        Role::class => RolePolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}
