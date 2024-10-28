<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'music_id' => 'b64b134e4b8f37452cf94577dbaae5db9a50c7a57933f15813797c13dca4dc564d87ea2fa879a950f6f55b5d3749969d1d325749c7d62c5fd2771fc3017667cc051dd6d82462318ce24aa1f014db0ba7',
            'title' => 'Indonesia Raya',
            'cover' => 'https://hls-server.vercel.app/img/122bbeec24de13dac248364f336c653ae7c5054468fecc5e80c86e61a44ba56eeabdd1611ae3ceb38b15fcfa4a547e8ddf7a6bac7876aeceece2db3b8387aaf9c043f82ff1a0dff47acf1247e5f744421721e7c61f5e2fc2a69d41d20b5c91e6',
            'stream_url' => 'https://musicapi.x007.workers.dev/fetch?id=b64b134e4b8f37452cf94577dbaae5db9a50c7a57933f15813797c13dca4dc564d87ea2fa879a950f6f55b5d3749969d1d325749c7d62c5fd2771fc3017667cc051dd6d82462318ce24aa1f014db0ba7',
            'artist' => 'Dausmini',
        ];
    }
}
