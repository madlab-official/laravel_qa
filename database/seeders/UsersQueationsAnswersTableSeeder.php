<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersQueationsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->delete();
        DB::table('questions')->delete();
        DB::table('users')->delete();

        User::factory(10)->create()
            ->each(function ($user) {
                $user->questions()
                    ->saveMany(
                        Question::factory(rand(1, 5))->make()
                    )
                    ->each(function ($question) {
                        $question->answers()
                            ->saveMany(
                                Answer::factory(rand(1, 5))->make()
                            );
                    });

            });
    }
}
