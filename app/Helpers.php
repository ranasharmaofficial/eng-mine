<?php
    use App\Models\BusinessSetting;
    use App\Models\Certificate;
    use App\Models\MasterProduct;
    use App\Models\Gallery;
    use App\Models\Testimonial;
    use App\Models\Pricing;
    use App\Models\PricingType;
    use App\Models\Blog;
    use App\Models\MasterService;
    use App\Models\FaqCategory;
    use App\Models\Staff;
    use App\Models\Video;
    use App\Models\MasterPartner;
    use App\Models\IndustryCmsPage;
    use App\Models\MasterSolution;
    use App\Models\ServiceCategory;
    use App\Models\Country;
    use App\Models\State;
    use App\Models\Service;
    use App\Models\CertifiedEngineer;
    use App\Models\Client;
    // use Intervention\Image\Facades\Image;
    // use BenMajor\ImageResize;


    /** Change DateTime format to any date/datetime format */
    if (!function_exists('convert_datetime_to_date_format')) {
        function convert_datetime_to_date_format($date, $format){
            return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($format);
        }
    }

    /** highlights the selected navigation on admin panel */
    if (!function_exists('areActiveRoutes')) {
        function areActiveRoutes(array $routes, $output = "active")
        {
            foreach ($routes as $route) {
                if (Route::currentRouteName() == $route) return $output;
            }
        }
    }

   /** return file uploaded via uploader */
    if (!function_exists('upload_asset')) {
        function upload_asset($file_name, $folder_name="all", $type="webp_conversion"){
            if ($type == "webp_conversion") {
                $img = \Image::make($file_name)->encode('webp', 90);
                $height = $img->height();
                $width = $img->width();
                // if($width > $height && $width > 1200){
                //     $img->resize(1200, null, function ($constraint) {
                //         $constraint->aspectRatio();
                //     });
                // }elseif ($height > 500) {
                //     $img->resize(null, 500, function ($constraint) {
                //         $constraint->aspectRatio();
                //     });
                // }
                $filename = $folder_name. '-' . date('YmdHis') . '-' .rand(1,10000). '.webp';
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                $img->save(base_path('public/').$file_path);
                return $file_path;
            }

            if ($type == "local") {
                $extenstion = $file_name->getClientOriginalExtension();
                $filename = $folder_name. '-' . date('YmdHis') . '-' .rand(1,10000). '.' . $extenstion;
                $file_name->move(public_path('uploads/'.$folder_name), $filename);
                $file_path = 'uploads/'.$folder_name.'/'. $filename;
                return $file_path;
            }

            if($type == "cloudinary"){
                $uploadedFileUrl = cloudinary()->upload($file_name->getRealPath())->getSecurePath();
                return $uploadedFileUrl;
            }
        }
    }

     /** Generate an asset path for the application */
    if (!function_exists('static_asset')) {
        function static_asset($path, $secure = null)
        {
            return app('url')->asset('public/' . $path, $secure);
        }
    }

    /** Fetch value by type and field_name from business setting */
    if (!function_exists('fetch_business_setting_value')) {
        function fetch_business_setting_value($type, $field_name)
        {
            return BusinessSetting::where('type', $type)->where('field_name', $field_name)->pluck('value')->first();
        }
    }

    if (!function_exists('fetch_business_setting_data')) {
        function fetch_business_setting_data($type)
        {
            return BusinessSetting::select('field_name', 'value')->where('type', $type)->first();
        }
    }


    if (!function_exists('get_business_single_cache_value')) {
        function get_business_single_cache_value($var_name, $type, $field_name = null){
            return Cache::rememberForever($var_name, function () use ($type, $field_name) {
                $output = DB::table('business_settings')
                    ->where('type', $type);
                    if($field_name != null){
                        $output = $output->where('field_name', $field_name)
                        ->select('value')->first();

                        return $output->value;
                    }else{
                        $output = $output->select('field_name', 'value')->first();

                        return $output;
                    }
                });
        }
    }

    if (!function_exists('get_business_multiple_cache_value')) {
        function get_business_multiple_cache_value($var_name, $type){
            return Cache::rememberForever($var_name, function () use ($type) {
                return DB::table('business_settings')->select('field_name', 'value')
                    ->where('type', $type)
                    ->get();
                });
        }
    }

    if (!function_exists('get_section_wise_data')) {
        function get_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                $output = DB::table('section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                    ->where('page_id', $page_id)
                    ->where('section_id', $section_id)
                    ->where('status', 1)
                    ->where('deleted_at', NULL)
                    ->orderBy('order_number', 'ASC');
                    if($limit_start >= 0 && $limit_end > 0){
                        $output->skip($limit_start)->take($limit_end);
                    }
                    if($limit_start > 0 && $limit_end = 0){
                        $output->limit($limit_start);
                    }
                    $output = $output->get();
                    return $output;
            }
        // );
        // }
    }

    if (!function_exists('get_product_section_wise_data')) {
        function get_product_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                $output = DB::table('product_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                    ->where('page_id', $page_id)
                    ->where('section_id', $section_id)
                    ->where('status', 1)
                    ->where('deleted_at', NULL)
                    ->orderBy('order_number', 'ASC');
                    if($limit_start >= 0 && $limit_end > 0){
                        $output->skip($limit_start)->take($limit_end);
                    }
                    if($limit_start > 0 && $limit_end = 0){
                        $output->limit($limit_start);
                    }
                    $output = $output->get();
                    return $output;
            }
        // );
        // }
    }

    if (!function_exists('get_service_section_wise_data')) {
        function get_service_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('service_section_datas')
                ->select('page_id', 'section_id', 'title', 'description', 'img', 'order_number')
                ->where('page_id', $page_id)
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->where('deleted_at', NULL)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();
            return $output;
        }
    }

    if (!function_exists('get_industry_section_wise_data')) {
        function get_industry_section_wise_data($section_id, $limit_start=0, $limit_end=0){
            $output = DB::table('industry_section_datas')->select('section_id', 'title', 'description', 'img', 'order_number', 'other')
                ->where('section_id', $section_id)
                ->where('status', 1)
                ->where('deleted_at', NULL)
                ->orderBy('order_number', 'ASC');
                if($limit_start >= 0 && $limit_end > 0){
                    $output->skip($limit_start)->take($limit_end);
                }
                if($limit_start > 0 && $limit_end = 0){
                    $output->limit($limit_start);
                }
                $output = $output->get();

            return $output;
        }
    }

    // certificate list
if (!function_exists('certificate_list')){
    function certificate_list()
    {
        return Certificate::get();
    }
}

    // master_product_list list
    if (!function_exists('master_product_list')){
        function master_product_list()
        {
            return MasterProduct::orderBy('order_no', 'ASC')->where('parent_id', 0)->where('status', 1)->get();
        }
    }

     // get_img_client_list list
    if (!function_exists('get_img_affiliations_list')){
        function get_img_affiliations_list()
        {
            return Gallery::where('category_id', 5)->where('status', 1)->get();
        }
    }

     // get_img_partner__list list
     if (!function_exists('get_img_partner__list')){
        function get_img_partner__list()
        {
            return Gallery::where('category_id', 4)->where('status', 1)->get();
        }
    }

    // get_img_client_list list
    if (!function_exists('get_img_client_list')){
        function get_img_client_list()
        {
            return Gallery::where('category_id', 3)->where('status', 1)->get();
        }
    }

    // Testimonial list
    if (!function_exists('testimonialList')){
        function testimonialList(){
            return Testimonial::latest()->where('status', 1)->get();
        }
    }

    // Video Testimonial list
    if (!function_exists('videoTestimonialList')){
        function videoTestimonialList(){
            return Video::latest()->where('status', 1)->get();
        }
    }

    //pricing list for all
    if(!function_exists('pricingList')){
        function pricingList($product_id){
            return Pricing::where('product_id', $product_id)->where('status', 1)->latest()->get();
        }
    }

     //pricing list for all
     if(!function_exists('pricingType')){
        function pricingType($product_id){
            return Pricing::select('master_products.id','master_products.title')
                        ->leftJoin('master_products','pricings.type_id', '=', 'master_products.id')
                        ->where('pricings.product_id', $product_id)
                        ->where('master_products.status', 1)
                        ->distinct()
                        ->get();
        }
    }

    // latestPostList list
    if (!function_exists('latestPostList')){
        function latestPostList(){
            return Blog::latest()->where('blogs.status',1)->where('blogs.type', 'blog')
            ->leftJoin('categories', 'categories.id', '=', 'blogs.category_id')
            ->select(['categories.title as categoryTitle', 'blogs.*'])
            ->paginate(10);
         }
    }

  // master_product_list list
  if (!function_exists('master_service_list')){
    function master_service_list()
    {
        return MasterService::where('parent_id', 0)->where('status', 1)->get();
    }
}

     //pricing list for all
     if(!function_exists('FaqCategory')){
        function FaqCategory(){
            return FaqCategory::where('type',1 )
                    ->get();
        }
    }

    if(!function_exists('commonFaqCategory')){
        function commonFaqCategory(){
            return FaqCategory::where('status', 1)->get();
        }
    }
    // where('type', 0)->

       // Team list
       if (!function_exists('ourTeamList')){
        function ourTeamList(){
           $staff_list = Staff::latest()->where('status', 1)->where('type', 'Main Staff')
            ->get();
            return $staff_list;
        }
    }

     // get table field list
    if (!function_exists('get_table_field_lists')){
        function get_table_field_lists($product_id)
        {
            return MasterProduct::select('table_fields')->where('id', $product_id)->where('status', 1)->first();
        }
    }

    // footer master service list
    if (!function_exists('footer_master_service')){
        function footer_master_service()
        {
            return MasterService::where('parent_id', 0)->where('status', 1)->limit(8)->get();
        }
    }

    // footer master service list
    if (!function_exists('footer_master_products')){
        function footer_master_products()
        {
            return MasterProduct::orderBy('order_no', 'ASC')->where('parent_id', 0)->where('status', 1)->limit(10)->get();
        }
    }

        // master_partner_list list
        if (!function_exists('master_partner_list')){
            function master_partner_list()
            {
                return MasterPartner::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_partner_section_wise_data')) {
            function get_partner_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('partner_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }

        // master_industry_page list
        if (!function_exists('master_industry_page')){
            function master_industry_page()
            {
                return IndustryCmsPage::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_indusry_section_wise_data')) {
            function get_indusry_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('industry_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }

        // master_industry_page list
        if (!function_exists('master_solution_list')){
            function master_solution_list()
            {
                return MasterSolution::where('parent_id', 0)->where('status', 1)->get();
            }
        }

        if (!function_exists('get_solution_section_wise_data')) {
            function get_solution_section_wise_data($page_id, $section_id, $limit_start=0, $limit_end=0){
                //return Cache::rememberForever($var_name, function () use ($section_id, $limit_start, $limit_end) {
                    $output = DB::table('solution_section_datas')->select('id', 'section_id', 'title', 'description', 'img', 'order_number', 'other')
                        ->where('page_id', $page_id)
                        ->where('section_id', $section_id)
                        ->where('status', 1)
                        ->where('deleted_at', NULL)
                        ->orderBy('order_number', 'ASC');
                        if($limit_start >= 0 && $limit_end > 0){
                            $output->skip($limit_start)->take($limit_end);
                        }
                        if($limit_start > 0 && $limit_end = 0){
                            $output->limit($limit_start);
                        }
                        $output = $output->get();
                        return $output;
                }
            // );
            // }
        }


        if(!function_exists('serviceCategoryList')){
            function serviceCategoryList(){
                return ServiceCategory::where('status', 1)->get();
            }
        }

        if(!function_exists('getCountryList')){
            function getCountryList(){
                return Country::where('status', 1)->get();
            }
        }

        if(!function_exists('getStateList')){
            function getStateList(){
                return State::where('country_id', 101)->get();
            }
        }

        if(!function_exists('getServiceList')){
            function getServiceList(){
                return Service::where('status', 1)->get();
            }
        }

        if(!function_exists('getCertifiedEngineer')){
            function getCertifiedEngineer(){
                return CertifiedEngineer::where('status', 1)->get();
            }
        }

        if(!function_exists('getClientList')){
            function getClientList(){
                return Client::where('status', 1)->get();
            }
        }

        /** amount in words in rupees */

    function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
                $digits = array('', 'hundred','thousand','lakh', 'crore');
                while( $i < $digits_length ) {
                        $divider = ($i == 2) ? 10 : 100;
                        $number = floor($no % $divider);
                        $no = floor($no / $divider);
                        $i += $divider == 10 ? 1 : 2;
                        if ($number) {
                                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
                        } else $str[] = null;
                }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }

    /** Get token */


    // function getZohoCode(){
    //     $zoho_client_id      =   env('ZOHO_CLIENT_ID');
    //     $zoho_client_secret  =   env('ZOHO_CLIENT_SECRET');
    //     $zoho_redirect_uri   =   "https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.b9c9d26fd68532bdf0b4cfd0ebcf8404.552f67e9193971907092a3f1f3540eeb&client_id=1000.3WL2F45B9QT7KYDXDBYJMGF3Z6D5RU&client_secret=38a8aae1530889a1f729c8473fac4b4b358708470b&grant_type=refresh_token";;


    //     if(ZohoCredential::all()->last() == null){

    //         $response = Http::post('https://accounts.zoho.com/oauth/v2/auth?scope=ZohoBooks.invoices.CREATE,ZohoBooks.invoices.READ,ZohoBooks.invoices.UPDATE,ZohoBooks.invoices.DELETE&client_id=1000.0SRSxxxxxxxxxxxxxxxxxxxx239V&state=testing&response_type=code&redirect_uri=http://www.zoho.com/books&access_type=offline', [
    //             'header' => 'Content-Type: application/json',
    //             'email' => $shiprocketEmailId,
    //             'password' => $shiprocketPassword,
    //         ]);

    //         $token  =   $response->json()['token'];
    //         $first_name  =   $response->json()['first_name'];
    //         $last_name  =   $response->json()['last_name'];
    //         $email  =   $response->json()['email'];
    //         $company_id  =   $response->json()['company_id'];

    //         // Save record into the table
    //         $shiprocketToken             =   new ZohoCredential();
    //         $shiprocketToken->token      =   $token;
    //         $shiprocketToken->first_name =   $first_name;
    //         $shiprocketToken->last_name  =   $last_name;
    //         $shiprocketToken->email      =   $email;
    //         // $shiprocketToken->password   =   $password;
    //         $shiprocketToken->company_id =   $company_id;
    //         $shiprocketToken->save();

    //     }
    //     else{
    //         $timeNow            =   Carbon::now(new \DateTimeZone('Asia/Kolkata'));
    //         $lastTokenTime      =   Carbon::parse(ShipRocket::all()->last()->updated_at->jsonSerialize())->timezone('Asia/Kolkata')->format('Y-m-d H:i:s');
    //         $hoursDifference    =   $timeNow->diffInHours($lastTokenTime);
    //         $token              =   null;

    //         if($hoursDifference > 23){
    //             // Create new token if token more than a day old
    //             $response = Http::post('https://apiv2.shiprocket.in/v1/external/auth/login', [
    //                 'header' => 'Content-Type: application/json',
    //                 'email' => $shiprocketEmailId,
    //                 'password' => $shiprocketPassword,

    //             ]);
    //             $token  =   $response->json()['token'];
    //             $first_name  =   $response->json()['first_name'];
    //             $last_name  =   $response->json()['last_name'];
    //             $email  =   $response->json()['email'];
    //             // $password  =   $response->json()['password'];
    //             $company_id  =   $response->json()['company_id'];
    //             // Save record into the table

    //             $shiprocketToken                =   new ShipRocket();
    //             $shiprocketToken->token         =   $token;
    //             $shiprocketToken->first_name    =   $first_name;
    //             $shiprocketToken->last_name     =   $last_name;
    //             $shiprocketToken->email         =   $email;
    //             // $shiprocketToken->password      =   $password;
    //             $shiprocketToken->company_id    =   $company_id;

    //             $shiprocketToken->save();

    //         }
    //         else{
    //             // Get current token
    //             $token      =   ShipRocket::all()->last()->token;
    //         }
    //     }
    //     return $token;
    // }


?>
