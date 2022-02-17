<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Service 1',
            'body' => 'Service 1 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);

        Service::create([
            'name' => 'Service 2',
            'body' => 'Service 2 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);

        Service::create([
            'name' => 'Service 3',
            'body' => 'Service 3 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);

        Service::create([
            'name' => 'Service 4',
            'body' => 'Service 4 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);

        Service::create([
            'name' => 'Service 5',
            'body' => 'Service 5 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);

        Service::create([
            'name' => 'Service 6',
            'body' => 'Service 6 Uncover New Insights, Answer More Questions, And Make Better Decisions, Together'
        ]);
    }
}
