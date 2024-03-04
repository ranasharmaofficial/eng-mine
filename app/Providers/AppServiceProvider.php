<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\LoginRepositoryInterface;
use App\Repositories\LoginRepository;
use App\Repositories\Interfaces\DesignationRepositoryInterface;
use App\Repositories\DesignationRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\SubCategoryRepositoryInterface;
use App\Repositories\SubCategoryRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\ImageCategoryRepositoryInterface;
use App\Repositories\ImageCategoryRepository;
use App\Repositories\Interfaces\GalleryRepositoryInterface;
use App\Repositories\GalleryRepository;
use App\Repositories\Interfaces\CmsPageRepositoryInterface;
use App\Repositories\CmsPageRepository;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;
use App\Repositories\TestimonialRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use App\Repositories\BusinessRepository;
use App\Repositories\Interfaces\FaqRepositoryInterface;
use App\Repositories\FaqRepository;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\StaffRepository;
use App\Repositories\Interfaces\IndustryRepositoryInterface;
use App\Repositories\IndustryRepository;
use App\Repositories\Interfaces\CareerRepositoryInterface;
use App\Repositories\CareerRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\Interfaces\PricingRepositoryInterface;
use App\Repositories\PricingRepository;
use App\Repositories\Interfaces\SolutionRepositoryInterface;
use App\Repositories\SolutionRepository;
use App\Repositories\Interfaces\PartnerRepositoryInterface;
use App\Repositories\PartnerRepository;
use App\Repositories\Interfaces\ServiceOrderRepositoryInterface;
use App\Repositories\ServiceOrderRepository;
use App\Repositories\Interfaces\EngineerRepositoryInterface;
use App\Repositories\EngineerRepository;
use App\Repositories\Interfaces\MasterDesignationRepositoryInterface;
use App\Repositories\MasterDesignationRepository;
use App\Repositories\Interfaces\UserTypeRepositoryInterface;
use App\Repositories\UserTypeRepository;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\ClientRepository;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use App\Repositories\FeedbackRepository;
use App\Repositories\Interfaces\TemplateRepositoryInterface;
use App\Repositories\TemplateRepository;



use App\Repositories\Interfaces\WebInterface\CommonRepositoryInterface;
use App\Repositories\WebRepo\CommonRepository;
use App\Repositories\Interfaces\WebInterface\WebServiceRepositoryInterface;
use App\Repositories\WebRepo\WebServiceRepository;
use App\Repositories\Interfaces\WebInterface\HProductRepositoryInterface;
use App\Repositories\WebRepo\HProductRepository;


/** Customer */
use App\Repositories\Interfaces\CustomerInterface\CustomerRepositoryInterface;
use App\Repositories\CustomerRepo\CustomerRepository;

/** Booking */
use App\Repositories\Interfaces\BookingInterface\BookingRepositoryInterface;
use App\Repositories\BookingRepo\BookingRepository;


/** Engineer Repository */
use App\Repositories\Interfaces\FrontEngInterface\FrontEngRepositoryInterface;
use App\Repositories\FrontEngineerRepo\FrontEngRepository;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(DesignationRepositoryInterface::class, DesignationRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubCategoryRepositoryInterface::class, SubCategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(ImageCategoryRepositoryInterface::class, ImageCategoryRepository::class);
        $this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
        $this->app->bind(CmsPageRepositoryInterface::class, CmsPageRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(TestimonialRepositoryInterface::class, TestimonialRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BusinessRepositoryInterface::class, BusinessRepository::class);
        $this->app->bind(FaqRepositoryInterface::class, FaqRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
        // $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(IndustryRepositoryInterface::class, IndustryRepository::class);
        $this->app->bind(CareerRepositoryInterface::class, CareerRepository::class);
        $this->app->bind(PricingRepositoryInterface::class, PricingRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(SolutionRepositoryInterface::class, SolutionRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);
        $this->app->bind(ServiceOrderRepositoryInterface::class, ServiceOrderRepository::class);
        $this->app->bind(EngineerRepositoryInterface::class, EngineerRepository::class);
        $this->app->bind(MasterDesignationRepositoryInterface::class, MasterDesignationRepository::class);
        $this->app->bind(UserTypeRepositoryInterface::class, UserTypeRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(FeedbackRepositoryInterface::class, FeedbackRepository::class);
        $this->app->bind(TemplateRepositoryInterface::class, TemplateRepository::class);

        /** Bind for Frontend */
        $this->app->bind(CommonRepositoryInterface::class, CommonRepository::class);
        $this->app->bind(HProductRepositoryInterface::class, HProductRepository::class);
        $this->app->bind(WebServiceRepositoryInterface::class, WebServiceRepository::class);

        /** Bind for Customer Panel */
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);

        /** Bind for Customer Panel */
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);

         /** Bind for Enginner Panel */
         $this->app->bind(FrontEngRepositoryInterface::class, FrontEngRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
