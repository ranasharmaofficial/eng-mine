<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\PricingEnq;
use App\Models\MasterProduct;
use Response;
use Session;
use App\Repositories\Interfaces\WebInterface\HProductRepositoryInterface;
use Stripe;




class ProductController extends Controller
{
    private $webRepository;

    public function __construct(HProductRepositoryInterface $webRepository)
    {
        $this->webRepository = $webRepository;
    }


    public function productDetails($slug){
        $productDetails = $this->webRepository->getProductDetails($slug);
        $datas = [
            'productDetails' => $productDetails,
            'section_lists' => $this->webRepository->getProductSectionData($productDetails->id),
            'checkPricingExist' => $this->webRepository->checkPricingExist($productDetails->id),
            'common_section_lists' => $this->webRepository->getPageSectionData(4),
        ];
        // dd($datas['productDetails']->id);
        return view('frontend.product.product_details_one', $datas);
    }

    public function showPricingDetails(Request $request){
        $data = $request->all();
        $pricingList = $this->webRepository->getPricingList($data);
        // dd($pricingList);
        // $request->pid  <td>' . $k . '</td>
        $output = '';
        foreach ($pricingList as $key => $row) {

            $k = $key + 1;

            $output .= '<tr>';
            foreach(json_decode($row->fields) as $key => $field) {
                if($key == 1){
                    $output .= '<td class="w-22">' . $field . '</td>';
                }else{
                    $output .= '<td>' . $field . '</td>';
                }
            }
            $output .= '<td>' . $row->price . '</td>';
            $output .= '<td><a onclick="sendPricingEnquiry(this)" id="'.$row->id.'" href="#"  rel="noopener" class="bg-sky rounded px-3 py-1 fs-13 text-white">Order Now</a></td></tr>';
        }
        echo  $output;
    }

    public function priceListPage(){
        $products = $this->webRepository->getProductList();
        foreach($products as $product){
            $product->count = $this->webRepository->checkPricingExist($product->id);
        }
        // dd($products);
        $datas = [
            'products' => $products,
        ];
        return view('frontend.price', $datas);
    }

    public function productPriceDetails($id){
        $princingDetails = $this->webRepository->getproductPriceDetails($id);
        $productDetails = $this->webRepository->getproductDetail($princingDetails->product_id);
        // dd($princingDetails);
        $datas = [
            'princingDetails' => $princingDetails,
            'productDetails' => $productDetails,
        ];
        return view('frontend.price_details', $datas);
    }

    public function stripeCheckout(Request $request){

        $get_price_data = Pricing::select('id', 'product_id', 'fields', 'price')->where('id', $request->pricing_id)->first();
        // dd($get_price_data->price);
        $get_product_fields = MasterProduct::select('id', 'title', 'table_fields')->where('id', $get_price_data->product_id)->first();


        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // $redirectUrl = route('stripe.checkout.success');
        $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';

        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,

            'customer_email' => $request->email,

            'payment_method_types' => ['card'],

            'line_items' => [
                [
                    'price_data' => [
                        'product_data' => [
                            'name' => $request->name,
                        ],
                        'unit_amount' => 100*$get_price_data->price,
                        'currency' => 'INR',
                    ],
                    'quantity' => 1
                ],
            ],

            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);

        return redirect($response['url']);

        $get_price_data = Pricing::select('id', 'product_id', 'fields', 'price')->where('id', $request->pricing_id)->first();
        $get_product_fields = MasterProduct::select('id', 'title', 'table_fields')->where('id', $get_price_data->product_id)->first();

        $store_price_enq = new PricingEnqTable();
        $store_price_enq->name = $request->name;
        $store_price_enq->phone = $request->phone;
        $store_price_enq->email = $request->email;
        $store_price_enq->skype = $request->skype;
        $store_price_enq->pricing_id = $request->pricing_id;
        $store_price_enq->message = $request->message;
        $store_price_enq->full_entry = $get_price_data['fields'];
        $store_price_enq->price = $get_price_data['price'];
        if($store_price_enq->save()){
            Mail::to("clenquiry@cloudwareindia.com")->send(new SendEnquiry($data, $get_price_data, $get_product_fields));
        }
    }

    public function checkoutSuccess(Request $request){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->checkout->sessions->retrieve($request->session_id);
        // dd($response);
        if($response->status=='complete'){

        }
        return redirect()->route('index')
                            ->with('success','Payment successful.');
    }

}
