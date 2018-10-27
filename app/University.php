<?php

namespace App;

class University
{
  private const universities_name = ["None", "Mumbai University", "Pune University"];
  private const universities_sc = ["None", "MU", "PU"];
  public static function getNames() {
    return Self::universities_name;
  }
  public static function getScs() {
    return Self::universities_sc;
  }
  public static function getFormat($index) {
    $data['name'] = Self::universities_name[$index];
    $data['shortname'] = Self::universities_sc[$index];
    return $data;
  }
}
