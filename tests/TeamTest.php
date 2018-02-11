<?php

use App\Team;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
	 
	 use DatabaseTransactions;
	 
    /**
     * @test
     */
    public function a_team_has_a_name()
    {
        $team = new Team(['name' => 'Acme']);
        
        $this->assertEquals('Acme', $team->name);
    }

	 /**
	  * @test
	  */
	 public function a_team_can_add_members()
	 {
		  $team = factory(Team::class)->create();
		  
		  $user = factory(\App\User::class)->create();
		  $userTwo = factory(\App\User::class)->create();
		  
		  $team->add($user);
		  $team->add($userTwo);
		  
		  $this->assertEquals(2, $team->count());
    }

	 /**
	  * @test
	  */
	 public function a_team_has_maximum_size()
	 {
	     $team = factory(Team::class)->create(['size' => 2]);
	     
	     $user1 = factory(\App\User::class)->create();
	     $user2 = factory(\App\User::class)->create();
	     
	     $team->add($user1);
	     $team->add($user2);
	     
	     $this->assertEquals(2, $team->count());
	     
	     $this->setExpectedExceptionRegExp('Exception');

		  $user3 = factory(\App\User::class)->create();
		  $team->add($user3);
	 }

	 /**
	  * @test
	  */
	 public function when_adding_many_members_at_once_you_still_cant_exceed_maximum_team_size()
	 {
		  $team = factory(Team::class)->create(['size' => 2]);
		  
		  $users = factory(\App\User::class, 3)->create();

		  $this->setExpectedExceptionRegExp('Exception');
		  
		  $team->add($users);
	 }
	 
	 /**
	  * @test
	  */
	 public function a_team_can_add_multiple_members()
	 {
	     $team = factory(Team::class)->create();
	     
	     $users = factory(\App\User::class, 2)->create();
	     
	     $team->add($users);
	     
	     $this->assertEquals(2, $team->count());
	 }
	 
	 /**
	  * @test
	  */
	 public function a_team_can_remove_a_member()
	 {
		  $team = factory(Team::class)->create(['size' => 2]);

		  $users = factory(\App\User::class, 2)->create();

		  $team->add($users);

		  $team->remove($users[0]);

		  $this->assertEquals(1, $team->count());
	 }
	 
	 /**
	  * @test
	  */
	 public function a_team_can_remove_all_members()
	 {
		  $team = factory(Team::class)->create(['size' => 3]);

		  $users = factory(\App\User::class, 3)->create();

		  $team->add($users);

		  $team->remove($users->slice(0, 2));
		  
		  $this->assertEquals(1, $team->count());
	 }
}
