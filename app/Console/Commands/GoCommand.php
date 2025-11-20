<?php

namespace App\Console\Commands;

use App\Models\Chat;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:go-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $user = User::first();
//        dd($user->profile);
//
//        $profile = Profile::first();
//        dd($profile->posts);

        $post = Chat::first();
        dd($post->profile);
    }
}
