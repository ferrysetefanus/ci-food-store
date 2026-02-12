<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product\Cart;
use App\Models\Product\Order;

class Products extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function productDetails($id)
    {
        $product = $this->db->query("SELECT * FROM products where id='$id'")->getFirstRow();

        $relatedProducts = $this->db->query("SELECT * FROM products where id != '$id' and category_id = '$product->category_id' ORDER BY id desc limit 5")->getResult();

        $count = $this->db->table('cart')
                      ->where('product_id', $id)
                      ->where('user_id', auth()->user()->id)
                      ->countAllResults();

        return view("products/single-product", compact("product", "relatedProducts", "count"));
    }

    public function shop()
    {
        // $product = $this->db->query("SELECT * FROM products where id='$id'")->getFirstRow();

        // $relatedProducts = $this->db->query("SELECT * FROM products where id != '$id' and category_id = '$product->category_id' ORDER BY id desc limit 5")->getResult();

        $categories = $this->db->query("SELECT * FROM categories")->getResult();

        $mostWantedProduct = $this->db->query("SELECT * FROM products ORDER BY name DESC limit 5")->getResult();
        $vegProduct = $this->db->query("SELECT * FROM products where category_id = 6 ORDER BY name DESC limit 5")->getResult();
        $meatProduct = $this->db->query("SELECT * FROM products where category_id = 4 ORDER BY name DESC limit 5")->getResult();
        $fishProduct = $this->db->query("SELECT * FROM products where category_id = 1 ORDER BY name DESC limit 5")->getResult();
        $fruitProduct = $this->db->query("SELECT * FROM products where category_id = 3 ORDER BY name DESC limit 5")->getResult();
        return view("products/shop", compact('categories', 'mostWantedProduct', 'vegProduct', 'meatProduct', 'fishProduct', 'fruitProduct'));
    }

    public function addToCart() 
    {
        $cart = new Cart;

        $product_id = $this->request->getPost('product_id');
        $data = [
            "product_id"    => $product_id,
            "user_id"       => auth()->user()->id,
            "qty"           => $this->request->getPost('qty'),
            "name"          => $this->request->getPost('name'),
            "price"         => $this->request->getPost('price'),
            "image"         => $this->request->getPost('image'),
            "subtotal"      => $this->request->getPost('price') * $this->request->getPost('qty')  
        ];

        session()->setFlashdata('success', 'Product added to cart');
        $cart->save($data);
        return redirect()->to(base_url('products/single-product/'.$product_id.''));
    }

    public function cart()
    {
        $user_id = auth()->user()->id;
        // displaying cart item
        $cartItem = $this->db->table('cart')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get()->getResult();

        $totalPrice = $this->db->table('cart')->selectSum('subtotal', 'whole_price')->where('user_id', $user_id)->get()->getFirstRow();
        return view("products/cart", compact("cartItem", "totalPrice"));
    }

    public function deleteFromCart($id)
    {
        $deleteProduct = new Cart();

        $deleteProduct->delete($id);

        session()->setFlashdata('danger', 'Product deleted from cart');
        return redirect()->to(base_url('products/cart'));
    }

    public function prepareCheckout()
    {
        $price = $this->request->getPost('price');

        $session = session();

        $session->set('price', $price);

        if($price > 0) {
            return redirect()->to(base_url('products/checkout'));
        }

        
    }

    public function checkout()
    {   
        $session = session();
    
        // echo "Total" . $session->get('price');
        $user_id = auth()->user()->id;
        // displaying cart item
        $cartItem = $this->db->table('cart')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get()->getResult();
        
        $subtotalPrice = $this->db->table('cart')->selectSum('subtotal', 'whole_price')->where('user_id', $user_id)->get()->getFirstRow();
        return view("products/checkout", compact('cartItem', 'subtotalPrice'));
    }

    public function processCheckout() 
    {
        $order = new Order;

        $price = $this->request->getPost('price');
        
        $data = [
            "name"              => $this->request->getPost('name'),
            "user_id"           => auth()->user()->id,
            "last_name"         => $this->request->getPost('last_name'),
            "address"           => $this->request->getPost('address'),
            "town"              => $this->request->getPost('town'),
            "state"             => $this->request->getPost('state'),
            "zip_code"          => $this->request->getPost('zip_code'),
            "phone"             => $this->request->getPost('phone'),
            "order_notes"       => $this->request->getPost('order_notes'),
            "price"             => $price,  
        ];

        $session = session();
        $session->set('full_price', $price);

        //session()->setFlashdata('success', 'Product added to cart');
        $order->save($data);
        if($order) {
            return redirect()->to(base_url('products/pay-with-paypal'));
        }
    }

    public function payWithPaypal()
    {
        return view('products/pay');
    }

    public function success()
    {
        $id = auth()->user()->id;
        $deleteProductsFromCart = $this->db->table('cart')->where('user_id', $id)->delete();

        if($deleteProductsFromCart) {
            $session = session();

            $session->remove('full_price');
            // $session->destroy();
        }

        return view('products/success');
    }
}
