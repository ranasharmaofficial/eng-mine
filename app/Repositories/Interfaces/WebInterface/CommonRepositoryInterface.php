<?php
namespace App\Repositories\Interfaces\WebInterface;
use Illuminate\Http\Request;

Interface CommonRepositoryInterface{
    public function getImageCategory();
    public function getHomePageBanner();
    public function getPage($page_id);
    public function getPageSectionData($page_id);
    // public function getStaffData($staff_type);

    public function getIndustryPage($slug);
    public function getIndustryPageSections($page_id);

    // public function getAboutus();
    public function getCategories($type);
    public function getRecentPost($type);
    public function getRelatedPost($type, $category_id);
    public function getBlogs($type, $slug);
    public function getBlogDetail($slug, $ip);
    public function getFaqs();
    public function getCareerList();
    public function getCareerDetail($career_id);
    public function storeCareerEnquiry($data);

    public function storeContactEnquiry($data);
    public function getTestimonial();
    public function getGallery();
    public function applyBlogAction($data);
    public function storeBlogComment($data);
    public function getBlogComments($blog_id);

    public function storeNewsletter($data);
    public function storePricingEnquiries($data);
}
