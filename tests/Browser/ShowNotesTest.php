<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group show-note
     */
    public function testNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void {
            $browser->visit(url:'/')
                    ->assertSee(text: 'Modul 3')
                    ->clickLink(link: 'Log in')
                    ->assertPathIs(path: '/login')
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard')
                    ->clickLink(link: 'Notes')
                    ->assertPathIs(path: '/notes')
                    ->click('@detail-1')
                    ->assertPathIs('/note/1');
        });
    }
}
