<?php

class HomePageTest extends TestCase
{
    /**
     * Home page test
     *
     * @return void
     */
    public function test_home_page_should_be_available()
    {
        $this->get(route('home'));
        $this->assertResponseOk();
        $this->seeJsonStructure([
            'message',
            'status',
        ]);
    }
}
