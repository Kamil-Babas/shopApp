<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['tester', 'tester', 'test@test', '60923093'],
            ['Jan', 'Kowalski', 'jan.kowalski1@example.com', '600123001'],
            ['Anna', 'Nowak', 'anna.nowak2@example.com', '600123002'],
            ['Piotr', 'Wiśniewski', 'piotr.wisniewski3@example.com', '600123003'],
            ['Katarzyna', 'Wójcik', 'katarzyna.wojcik4@example.com', '600123004'],
            ['Tomasz', 'Kowalczyk', 'tomasz.kowalczyk5@example.com', '600123005'],
            ['Magdalena', 'Kamińska', 'magdalena.kaminska6@example.com', '600123006'],
            ['Paweł', 'Lewandowski', 'pawel.lewandowski7@example.com', '600123007'],
            ['Agnieszka', 'Zielińska', 'agnieszka.zielinska8@example.com', '600123008'],
            ['Michał', 'Szymański', 'michal.szymanski9@example.com', '600123009'],
            ['Barbara', 'Woźniak', 'barbara.wozniak10@example.com', '600123010'],
            ['Krzysztof', 'Dąbrowski', 'krzysztof.dabrowski11@example.com', '600123011'],
            ['Ewa', 'Kozłowska', 'ewa.kozlowska12@example.com', '600123012'],
            ['Marcin', 'Jankowski', 'marcin.jankowski13@example.com', '600123013'],
            ['Aleksandra', 'Mazur', 'aleksandra.mazur14@example.com', '600123014'],
            ['Łukasz', 'Krawczyk', 'lukasz.krawczyk15@example.com', '600123015'],
            ['Natalia', 'Grabowska', 'natalia.grabowska16@example.com', '600123016'],
            ['Adrian', 'Pawłowski', 'adrian.pawlowski17@example.com', '600123017'],
            ['Monika', 'Michalska', 'monika.michalska18@example.com', '600123018'],
            ['Mateusz', 'Nowicki', 'mateusz.nowicki19@example.com', '600123019'],
            ['Julia', 'Adamska', 'julia.adamska20@example.com', '600123020'],
        ];

        foreach ($users as [$name, $surname, $email, $phone]) {
            User::create([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'phone_number' => $phone,
                'email_verified_at' => now(),
                'role_id' => 2,
                'password' => Hash::make('password'), // domyślne hasło: "password"
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
