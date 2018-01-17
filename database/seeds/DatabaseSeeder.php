<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UserTableSeeder::class);
//        $this->call(PlanTableSeeder::class);
//        $this->call(EducationTableSeeder::class);
//        $this->call(BrokensTableSeeder::class);
//        $this->call(OccupationTableSeeder::class);
//        $this->call(RegionTableSeeder::class);
//        $this->call(StatateTableSeeder::class);
//        $this->call(CityTableSeeder::class);
//        $this->call(PackageTableSeeder::class);
//        $this->call(RolerTableSeeder::class);
//        $this->call(CandidateTableSeeder::class);
        $this->call(VoterTableSeeder::class);
//        $this->call(CollaboratorTableSeeder::class);
    }
}
