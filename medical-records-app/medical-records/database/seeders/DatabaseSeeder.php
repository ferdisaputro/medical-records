<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\Poly;
use App\Models\Schedule;
use App\Models\Registration;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
/**
 * Seed the application's database.
 *
 * @return void
 */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    Detail::factory(6)->create();
  // Doctor::factory(6)->create();
    Prescription::factory(50)->create();
    Medicine::factory(50)->create();
    Patient::factory(50)->create();
    // Poli::factory(6)->create();
    Payment::factory(50)->create();
    Registration::factory(50)->create();
    User::factory(6)->create();

    User::create([
      'username' => 'admin',
      'user_status' => 'pegawai tetap',
      'password' => bcrypt('password')
    ]);
    User::create([
      'username' => 'mamank',
      'user_status' => 'magang',
      'password' => bcrypt('password')
    ]);

    Poly::create([
      'poly_name' => 'poli gigi'
    ]);
    Poly::create([
      'poly_name' => 'poli umum'
    ]);
    Poly::create([
      'poly_name' => 'poli mata'
    ]);

    Doctor::create([
      'doctor_name' => 'Dr.rozali',
      'specialist' => 'gigi',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1000',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);
    Doctor::create([
      'doctor_name' => 'Dr.risa',
      'specialist' => 'gigi',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1000',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);
    Doctor::create([
      'doctor_name' => 'mayang ',
      'specialist' => 'umum',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1001',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);
    Doctor::create([
      'doctor_name' => 'munkar',
      'specialist' => 'umum',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1001',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);
    Doctor::create([
      'doctor_name' => 'rozak',
      'specialist' => 'mata',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1002',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);
    Doctor::create([
      'doctor_name' => 'Dr. mamank',
      'specialist' => 'mata',
      'doctor_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.',
      'poly_code' => '1002',
      'fee' => 30000,
      'doctor_number' => '081234541235'
    ]);

    Schedule::create([
      'doctor_code' => 1000,
      'poly_code' => 1000,
      'day' => 'Monday',
      'start' => '07:00:00',
      'end' => '15:00:00',
    ]);
    Schedule::create([
      'doctor_code' => 1001,
      'poly_code' => 1000,
      'day' => 'Monday',
      'start' => '15:00:00',
      'end' => '23:00:00',
    ]);
    Schedule::create([
      'doctor_code' => 1002,
      'poly_code' => 1001,
      'day' => 'Monday',
      'start' => '07:00:00',
      'end' => '15:00:00',
    ]);
    Schedule::create([
      'doctor_code' => 1003,
      'poly_code' => 1001,
      'day' => 'Monday',
      'start' => '07:00:00',
      'end' => '15:00:00',
    ]);
  }
}
