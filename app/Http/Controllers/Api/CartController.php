<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Cookie;
use App\Course;
use App\ResponseBuilder;

class CartController extends Controller
{
  public function postAddCart(Request $request) {
    $course = $request->input('course', '-1');
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    if(!in_array($course, $cart)) {
      array_push($cart, $course);
    }
    $cart = json_encode($cart);
    Cookie::queue(Cookie::forever('cart', $cart));
    return ResponseBuilder::send(true, '', '');
  }

  public function postRemoveCart(Request $request) {
    $course = $request->input('course', '-1');
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    if(in_array($course, $cart)) {
      unset($cart[array_search($course, $cart)]);
    }
    $cart = json_encode($cart);
    Cookie::queue(Cookie::forever('cart', $cart));
    return ResponseBuilder::send(true, '', '');
  }

  public function getCart(Request $request) {
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    if($request->input('details') == '1') {
      $list = [];
      foreach ($cart as $c) {
        $course = Course::find($c);
        array_push($list, $course->format());
      }
      return $list;
    }
    return $cart;
  }
}
