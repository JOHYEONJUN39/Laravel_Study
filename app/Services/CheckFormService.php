<?php

namespace App\Services;

class CheckFormService {

  public static function checkGender($request) {
    if($request->gender === 0 ) {
      $gender = '남성';
    } else {
      $gender = '여성';
    }
    return $gender;
  }

  public static function chckAge($contact) {
    if($contact->age === 1) { $age = '19세 미만'; }
    if($contact->age === 2) { $age = '20〜29세'; }
    if($contact->age === 3) { $age = '30〜39세'; }
    if($contact->age === 4) { $age = '40〜49세'; }
    if($contact->age === 5) { $age = '50〜59세'; }
    if($contact->age === 6) { $age = '60세 이상'; }

    return $age;
  }
}