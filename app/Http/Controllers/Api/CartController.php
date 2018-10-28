<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Cookie;

use App\ResponseBuilder;

class CartController extends Controller
{
  public function postToggleCart(Request $request) {
    $course = $request->input('course', '-1');
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    if(in_array($course, $cart)) {
      unset($cart[array_search($course, $cart)]);
    } else {
      array_push($cart, $course);
    }
    $cart = json_encode($cart);
    Cookie::queue(Cookie::forever('cart', $cart));
    return ResponseBuilder::send(true, '', '');
  }

  public function getCart(Request $request) {
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    return $cart;
  }
}
