<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blogs;
use App\Models\Commentables;
use App\Models\Music;
use App\Models\Comments;
use App\Models\Timeline;
use Database\Factories\CommentablesFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'uuid' =>  "c34e85ef-c00e-3124-880c-f01721857114",
            'fullname' => "Bhadrika Aryaputra Hermawan",
            'username' => "bhadrika05",
            'email' => "me@bhadrikais.my.id",
            'password' => Hash::make('bhadrika123'),
            'image' => fake()->imageUrl(1280, 720),
            'is_admin' => true,
        ]);

        Music::factory()->create([
            'music_id' => 'b64b134e4b8f37452cf94577dbaae5db9a50c7a57933f15813797c13dca4dc564d87ea2fa879a950f6f55b5d3749969d1d325749c7d62c5fd2771fc3017667cc051dd6d82462318ce24aa1f014db0ba7',
            'title' => 'Indonesia Raya',
            'cover' => 'https://hls-server.vercel.app/img/122bbeec24de13dac248364f336c653ae7c5054468fecc5e80c86e61a44ba56eeabdd1611ae3ceb38b15fcfa4a547e8ddf7a6bac7876aeceece2db3b8387aaf9c043f82ff1a0dff47acf1247e5f744421721e7c61f5e2fc2a69d41d20b5c91e6',
            'stream_url' => 'https://musicapi.x007.workers.dev/fetch?id=b64b134e4b8f37452cf94577dbaae5db9a50c7a57933f15813797c13dca4dc564d87ea2fa879a950f6f55b5d3749969d1d325749c7d62c5fd2771fc3017667cc051dd6d82462318ce24aa1f014db0ba7',
            'artist' => 'Dausmini',
        ]);

        Blogs::factory()->create([
            'uuid' => 'blog-1',
            'cover' => 'https://hls-server.vercel.app/img/122bbeec24de13dac248364f336c653ae7c5054468fecc5e80c86e61a44ba56eeabdd1611ae3ceb38b15fcfa4a547e8ddf7a6bac7876aeceece2db3b8387aaf9c043f82ff1a0dff47acf1247e5f744421721e7c61f5e2fc2a69d41d20b5c91e6',
            'title' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum, magnam.",
            "slug" => fake()->slug(),
            'article' => fake()->paragraph(mt_rand(3, 6)),
            'author_id' => '1',
        ]);

        Timeline::factory()->create([
            'slug' => 'tmln-1',
            'judul' => fake()->text(10),
            'content' => 'https://hls-server.vercel.app/img/122bbeec24de13dac248364f336c653ae7c5054468fecc5e80c86e61a44ba56eeabdd1611ae3ceb38b15fcfa4a547e8ddf7a6bac7876aeceece2db3b8387aaf9c043f82ff1a0dff47acf1247e5f744421721e7c61f5e2fc2a69d41d20b5c91e6',
            'music_id' => 1,
            'author_id' => 1,
        ]);


        User::factory(12)->create();
        Blogs::factory(12)->create();
        Timeline::factory(12)->create();
        Comments::factory(15)->create();
        Commentables::factory(5)->create();
    }
}
