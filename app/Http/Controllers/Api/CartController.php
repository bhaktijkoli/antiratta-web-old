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
    $newcart = [];
    foreach ($cart as $c) {
      if($c != $course) array_push($newcart, $c);
    }
    $newcart = json_encode($newcart);
    Cookie::queue(Cookie::forever('cart', $newcart));
    return ResponseBuilder::send(true, '', '');
  }

  public function getCart(Request $request) {
    $cart = Cookie::get('cart', "[]");
    $cart = json_decode($cart);
    if($request->input('details') == '1') {
      $total = 0;
      $list = [];
      foreach ($cart as $c) {
        $course = Course::find($c);
        array_push($list, $course->format());
        $total += $course->price;
      }
      $data['courses'] = $list;
      $data['total'] = number_format($total);
      return $data;
    }
    $cart = json_encode($cart);
    return $cart;
  }
}
