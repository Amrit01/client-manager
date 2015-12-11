<?php

class ClientTest extends TestCase
{
    public function testIndexMethodOnClientController()
    {
        $response = $this->call('GET', 'client');
        $this->assertViewHas('clients');
        $clients = $response->original->getData()['clients'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $clients);
        $this->assertInstanceOf('Illuminate\Support\Collection', $clients->getCollection());
        $this->visit('client')
             ->click('Add New Client')
             ->seePageIs('client/create');
    }

    public function testCreateClientWithValidData()
    {
        $this->withoutMiddleware();
        $formData = [
            'name'                   => 'Amrit G.C',
            'gender'                 => 'male',
            'email'                  => 'music.demand01@gmail.com',
            'phone'                  => '9824371233',
            'address'                => 'New Baneshwor',
            'nationality'            => 'Nepalese',
            'date_of_birth'          => '2014-12-07	',
            'qualification'          => 'SLC',
            'preferred_contact_mode' => 'email',
        ];
        $this->post('client', $formData);
        $this->assertSessionHas('success');
    }

    public function testCreateClientWithInValidData()
    {
        $this->withoutMiddleware();
        $this->post('client');
        $this->assertSessionHasErrors();
        $this->assertHasOldInput();
    }
}
