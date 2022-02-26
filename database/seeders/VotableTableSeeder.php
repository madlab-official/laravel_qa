<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votables')->where('votable_type', 'App\Question')->delete();
        DB::table('votables')->delete();

        $users = User::all();
        $numberOfUser = $users->count();
        $votes = [-1, 1];

        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(1, $numberOfUser); $i++) {
                $user = $users[$i];
                $user->voteQuestion($question, $votes[rand(0, 1)]);
            }
        }
    }
}
