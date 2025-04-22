<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegistrasi(): void
    {

        $this->browse(function (Browser $browser): void {
            $browser->visit(url: '/') // mengunjungi halaman utama aplikasi dengan route "/"
                    ->assertSee(text: 'started') // memastikan halaman memuat teks "started"
                    ->clickLink(link: 'Registrasi') // mengklik link dengan teks "Registrasi"
                    ->assertPathIs(path: '/regist') // memastikan user diarahkan ke halaman "/regist"
                    ->type(field: 'email', value: 'admin@gmail.com') // mengisi input field "email" dengan "admin@gmail.com"
                    ->type(field: 'password', value: 'password') // mengisi input field "password" dengan "password"
                    ->press(button: 'Registrasi') // menekan tombol "Registrasi" untuk mengirimkan form
                    ->assertPathIs(path: '/dashboard'); // memastikan setelah registrasi diarahkan ke halaman "/dashboard"
        });
    }
}
