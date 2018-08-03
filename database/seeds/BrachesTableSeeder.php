<?php

use Illuminate\Database\Seeder;

class BrachesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $branches = array(
      array(
        'university'=>'1',
        'name'=>'Information Technology',
      ),
      array(
        'university'=>'1',
        'name'=>'Computer Science',
      ),
      array(
        'university'=>'1',
        'name'=>'Electronics',
      ),
    );
    foreach ($branches as $branch) {
      DB::table('branches')->insert([
        'university' => $branch['university'],
        'name' => $branch['name'],
      ]);
    }
  }
}
