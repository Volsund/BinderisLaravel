<?php

use App\Decision;
use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserSeeder extends Seeder
{
    public function run()
    {

        $users = factory(User::class, 100)->make();

        foreach ($users as $user) {

            $user->save();

            //todo Why is decision seeder not working?
//            $decision = factory(Decision::class,4)->make();
//            $decision->user()->associate($user);
//            $decision->save();

            $profile = factory(Profile::class)->make();
            $profile->user()->associate($user);
            $profile->save();

            $picLocation = $profile->profile_picture;
            $destination = 'public/profilePictures/' . $user->id . '.jpeg';
            Storage::copy($picLocation, $destination);

            $profile->update([
                'profile_picture' => $destination,
                'profile_picture_name' => $user->id . '.jpeg'
            ]);

            $this->generatePictures($user, rand(1, 5));
        }
    }

    public function generatePictures(User $user, int $amount = 1)
    {
        factory(Picture::class, $amount)
            ->make()
            ->each(function (Picture $picture) use ($user) {
                $picture->user()->associate($user);
                $picture->save();
            });
    }
}
