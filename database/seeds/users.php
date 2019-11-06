<?php

use Illuminate\Database\Seeder;
use App\User;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert($this->data());
    }
    public function data(){
        $data=[
        [25, 'administrator', 'avatars/default-user.png', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$miBVu30BH0mM4wxuKzs2uO7CJGT0KGkb5HdyvrqhdiFmhQg.flB9W', NULL, NULL, 1, NULL, '2019-08-22 03:36:17', '2019-08-22 03:36:17', NULL],
        [24, 'Nguyễn Minh Quang', 'avatars/24-_-41320067_2092099494421351_4982652849272913920_n.png', 'nmnquang21@gmail.com', NULL, NULL, NULL, '$2y$10$miBVu30BH0mM4wxuKzs2uO7CJGT0KGkb5HdyvrqhdiFmhQg.flB9W', NULL, NULL, 1, NULL, NULL, '2019-08-15 13:41:19', NULL],
        ];
        $user=[];
        foreach ($data as $item){
            $user[]=[
                'name'=>$item[1],
                'avatar'=>$item[2],
                'email'=>$item[3],
                'password'=>$item[7],
            ];
        }
        return $user;
    }
}
