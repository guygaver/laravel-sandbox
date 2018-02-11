<?php

use App\Mail\SupportTicket;

class ContactSupportTest extends TestCase
{

	 /**
	  * @test
	  */
	 public function it_sends_a_contact_support_test()
	 {
		  \Illuminate\Support\Facades\Mail::fake();

		  $this->contact();

		  \Illuminate\Support\Facades\Mail::assertSent(SupportTicket::class);
	 }

	 /**
	  * @test
	  */
	 public function it_requires_a_name()
	 {
		  $this->contact($this->validFields(['name' => '']))
				->assertSessionHasErrors('name');
	 }

	 /**
	  * @test
	  */
	 public function it_requires_a_valid_email()
	 {
		  $this->contact($this->validFields(['email' => 'not an email']))
				->assertSessionHasErrors('email');
	 }

	 /**
	  * @test
	  */
	 public function it_requires_a_question()
	 {
		  $this->contact($this->validFields(['question' => '']))
				->assertSessionHasErrors('question');
	 }

	 protected function contact($attributes = [])
	 {
		  return $this->post('/contact', $this->validFields($attributes));
	 }

	 /**
	  * Helper allows us to pass all fields and override values for our tests
	  *
	  * @param array $overrides
	  * @return array
	  */
	 protected function validFields($overrides = [])
	 {
		  return array_merge([
				'name'         => 'Guy G',
				'email'        => 'test@gmail.com',
				'question'     => 'Help Me',
		  ], $overrides);
	 }
}
