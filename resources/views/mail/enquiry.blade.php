<h2>Enquiry For {{$get_product_fields->title}}</h2>
<p>
    Name : {{$data['name']}} <br>
    Email : {{$data['email']}} <br>
    Contact Number  : {{$data['phone']}} <br>
    @foreach(json_decode($get_product_fields->table_fields) as $key => $value)
    {{$value}} : {{json_decode($get_price_data->fields)[$key]}} <br>
    @endforeach
    Price : {{$get_price_data['price']}}<br>
    Message : {{$data['message']}}
</p>
