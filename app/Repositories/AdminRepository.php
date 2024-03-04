<?php
namespace App\Repositories;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use App\Models\OrderDetail;
use App\Models\EngineerJob;

class AdminRepository implements AdminRepositoryInterface
{
    public function dashboardDataCount(){
        $user_count = User::where(['user_type_id' => 3, 'status' => 1])->count();
        $category_count = Category::where('parent_id', 0)->where('status', 1)->count();
        $subcategory_count = Category::where('parent_id', '!=', 0)->where('status', 1)->count();
        $blog_count = Blog::where('status', 1)->count();
        $blog_like_count = Blog::where('status', 1)->sum('total_like');
        $blog_comment_count = Blog::where('status', 1)->sum('total_comment');
        $blog_view_count = Blog::sum('total_view');

        $countUpcomingServiceOrder = OrderDetail::where('status', 6)->count();
        $inProgressServiceOrder = OrderDetail::where('status', 2)->count();
        $completedServiceOrder = OrderDetail::where('status', 3)->count();
        $pendingServiceOrder = OrderDetail::where('status', 0)->count();
        $totalServiceOrder = OrderDetail::count();
        $totalEngineer = User::where('user_type_id', 4)->count();
        $totalCustomer = User::where('user_type_id', 3)->count();



        $data = [
            'user_count' => $user_count,
            'category_count' => $category_count,
            'subcategory_count' => $subcategory_count,
            'blog_count' => $blog_count,
            'blog_like_count' => $blog_like_count,
            'blog_comment_count' => $blog_comment_count,
            'blog_view_count' => $blog_view_count,
            'countUpcomingServiceOrder' => $countUpcomingServiceOrder,
            'inProgressServiceOrder' => $inProgressServiceOrder,
            'completedServiceOrder' => $completedServiceOrder,
            'pendingServiceOrder' => $pendingServiceOrder,
            'totalServiceOrder' => $totalServiceOrder,
            'totalEngineer' => $totalEngineer,
            'totalCustomer' => $totalCustomer,

            'ongoingJobsList' => EngineerJob::where('engineer_jobs.status', 'ongoing')
                                    ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
                                    ->leftJoin('users as ue', 'ue.id', '=', 'engineer_jobs.engineer_id')
                                    ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
                                    ->select('engineer_jobs.*','ue.first_name as eng_first_name','ue.last_name as eng_last_name','ue.username as eng_username','o.id as order_id','o.created_at as order_date','o.service_order_id','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
                                    ->latest()
                                    ->get(),

            'UpcomingJobsList' => EngineerJob::where('engineer_jobs.status', 'upcoming')
                                    ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
                                    ->leftJoin('users as ue', 'ue.id', '=', 'engineer_jobs.engineer_id')
                                    ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
                                    ->select('engineer_jobs.*','ue.first_name as eng_first_name','ue.last_name as eng_last_name','ue.username as eng_username','o.id as order_id','o.created_at as order_date','o.service_order_id','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
                                    ->latest()
                                    ->get(),

            'recentlyCompletedJobsList' => EngineerJob::where('engineer_jobs.status', 'completed')
                                    ->leftJoin('users as u', 'u.id', '=', 'engineer_jobs.user_id')
                                    ->leftJoin('users as ue', 'ue.id', '=', 'engineer_jobs.engineer_id')
                                    ->leftJoin('orders as o', 'o.id', '=', 'engineer_jobs.order_id')
                                    ->select('engineer_jobs.*','ue.first_name as eng_first_name','ue.last_name as eng_last_name','ue.username as eng_username','o.id as order_id','o.created_at as order_date','o.service_order_id','o.location', 'o.landmark', 'o.city', 'o.state', 'o.pincode', 'u.first_name', 'u.last_name', 'u.mobile', 'u.email', 'u.address', 'u.state')
                                    ->latest()
                                    ->take(10)
                                    ->get(),

            'recentlyCustomerAdded' => User::where('user_type_id', '3')->where('users.is_verified', 1)->where('users.user_type', NULL)->orWhere('users.user_type', 'proper_user')->latest()->take(10)->get(),
            'recentlyEngineerAdded' => User::where('user_type_id', '4')->where('users.is_verified', 1)->latest()->take(10)->get(),
            // 'recentlyCustomerAdded' => Users::where('user_type_id', '3')->latest()->take(10)->get(),


        ];
        return $data;
    }


}
