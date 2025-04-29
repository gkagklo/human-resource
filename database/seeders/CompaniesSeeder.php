<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Company A',
                'email' => 'contact@companya.com',
                'website' => 'https://www.companya.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company B',
                'email' => 'contact@companyb.com',
                'website' => 'https://www.companyb.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company C',
                'email' => 'contact@companyc.com',
                'website' => 'https://www.companyc.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company D',
                'email' => 'contact@companyd.com',
                'website' => 'https://www.companyd.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company E',
                'email' => 'contact@companye.com',
                'website' => 'https://www.companye.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        foreach(Company::all() as $key => $company) {
            $company->users()->attach(1);
        }
    }
}
