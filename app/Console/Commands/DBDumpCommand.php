<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Branch;
use App\Course;

class DBDumpCommand extends Command
{
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'db:dump';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Dump data';

  /**
  * Create a new command instance.
  *
  * @return void
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Execute the console command.
  *
  * @return mixed
  */
  public function handle()
  {
    $user = User::where('role','1')->first();
    if(!$user) return $this->error('No administrator found!');
    $branches = array(
      array(
        'name'=> 'Information Technology',
        'shortname'=> 'IT',
      ),
      array(
        'name'=> 'Computer Science',
        'shortname'=> 'IT',
      ),
      array(
        'name'=> 'Electronics Engineering',
        'shortname'=> 'ELECTRONICS',
      ),
      array(
        'name'=> 'Electronics & Telecommunication',
        'shortname'=> 'EXTC',
      ),
    );

    foreach ($branches as $b) {
      $branch = new Branch();
      $branch->name = $b['name'];
      $branch->shortname = $b['shortname'];
      $branch->sems = "[3,4,5,6,7,8]";
      $branch->university = 1;
      $branch->user = $user->id;
      $branch->save();
    }

    $this->info("Data has been added");

  }
}
