<?php

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

        $users = factory(User::class, 50)->make();

        foreach ($users as $user) {

            $user->save();

            $profile = factory(Profile::class)->make();
            $profile->user()->associate($user);
            $profile->save();
            $picLocation = $profile->profile_picture;
            $destination = 'public/profilePictures/' . $user->id . '.jpeg';
            Storage::copy($picLocation, $destination);

            // Resize image
//            $contents = Storage::get('public/profilePictures/' . $user->id . '.jpeg');
//            $img = Image::make($contents);
//            $img->resize(null, 300, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            // How do i save this???
//            $path = 'storage/profilePictures/'.$user->name . '.jpeg';
//            $img->save($path);



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
