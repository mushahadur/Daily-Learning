<?php

namespace App\Providers;

use App\Repositories\CouponRepository;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use App\Repositories\PackageRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ExploreCountryRepository;
use App\Repositories\ExploreCategoryRepository;
use App\Repositories\ExploreLanguageRepository;
use App\Repositories\ExploreHyperlinkRepository;
use App\Repositories\SubscribePlanRepository;
use App\Repositories\ExplorePublicationTypeRepository;
use App\Repositories\Interfaces\PackageRepositoryInterface;
use App\Repositories\ExploreHeaderRepository;
use App\Repositories\ExploreSiteRepository;
use App\Repositories\ExploreSubHeaderRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserCreateRepository;
use App\Repositories\RolePermissionRepository;
use App\Repositories\CustomerRepository\SubscriptionRepository;
use App\Repositories\Interfaces\SubscribePlanRepositoryInterface;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
use App\Repositories\Interfaces\UserCreateRepositoryInterface;
use App\Repositories\Interfaces\ExploreHeaderRepositoryInterface;
use App\Repositories\Interfaces\ExploreCountryRepositoryInterface;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;
use App\Repositories\Interfaces\ExploreCategoryRepositoryInterface;
use App\Repositories\Interfaces\ExploreLanguageRepositoryInterface;
use App\Repositories\Interfaces\ExploreSiteRepositoryInterface;
use App\Repositories\Interfaces\ExploreSubHeaderRepositoryInterface;
use App\Repositories\Interfaces\ExplorePublicationTypeRepositoryInterface;
use App\Repositories\Interfaces\ExploreHyperlinkRepositoryInterface;
use App\Repositories\Interfaces\CustomerInterfaces\SubscriptionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(ExploreHeaderRepositoryInterface::class, ExploreHeaderRepository::class);
        $this->app->bind(ExploreSubHeaderRepositoryInterface::class, ExploreSubHeaderRepository::class);
        $this->app->bind(ExploreCategoryRepositoryInterface::class, ExploreCategoryRepository::class);
        $this->app->bind(ExploreCountryRepositoryInterface::class, ExploreCountryRepository::class);
        $this->app->bind(ExploreLanguageRepositoryInterface::class, ExploreLanguageRepository::class);
        $this->app->bind(UserCreateRepositoryInterface::class, UserCreateRepository::class);
        $this->app->bind(RolePermissionRepositoryInterface::class, RolePermissionRepository::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(ExplorePublicationTypeRepositoryInterface::class, ExplorePublicationTypeRepository::class);
        $this->app->bind(ExploreHyperlinkRepositoryInterface::class, ExploreHyperlinkRepository::class);
        $this->app->bind(ExploreSiteRepositoryInterface::class, ExploreSiteRepository::class);
        $this->app->bind(SubscribePlanRepositoryInterface::class, SubscribePlanRepository::class);
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(SubscribePlanRepositoryInterface::class, SubscribePlanRepository::class);
        $this->app->bind(CouponRepositoryInterface::class, CouponRepository::class);

    }
}
