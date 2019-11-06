<?php

use Illuminate\Database\Seeder;
use App\Customer;
class customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert($this->data());
    }
    public function data(){
        $data = [
        [1, 'Nguyễn Minh Quang', 'https://graph.facebook.com/v3.0/2425301591129033/picture?type=normal', NULL, 'nmquang21@gmail.com', 'nmquang21@gmail.com', 1336211, -1026293.3, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', '2425301591129033', '2425301591129033', NULL, '2019-08-12 19:28:53', '2019-08-23 15:05:46', NULL],
        [2, 'Nguyễn Minh Quang', NULL, NULL, NULL, 'admin@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$aJY.I/vsjTTJmdF8JtaBuec0ad97/hmI7BlmWU17I1J87vZUxiaAG', NULL, NULL, NULL, '2019-08-12 19:43:14', '2019-08-12 19:43:14', NULL],
        [3, 'Quang Nguyễn Minh', 'https://lh3.googleusercontent.com/-oSukAvAcfMM/AAAAAAAAAAI/AAAAAAAAAF8/cbnJ5LE80uw/photo.jpg', NULL, 'quangminhbnbx@gmail.com', 'quangminhbnbx@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', '100009638987053603876', '100009638987053603876', NULL, '2019-08-12 20:00:58', '2019-08-12 20:00:58', NULL],
        [4, 'QUANG NGUYEN MINH', 'https://lh3.googleusercontent.com/-llFWwBuwpkA/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rc1JVIP2rUio4FU1kaN_EnnKWKZRQ/photo.jpg', NULL, 'nguyenminhquang_t62@hus.edu.vn', 'nguyenminhquang_t62@hus.edu.vn', 0, -263939.80000000005, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', '100442279703835181625', '100442279703835181625', NULL, '2019-08-12 20:04:17', '2019-08-21 05:54:36', NULL],
        [5, 'Linh', NULL, NULL, NULL, 'Linhly.lnl@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$PBVpvb5UgVFi1J4x8xUgi.6lVknDqcWjkNfM14WA7L1cG0zAZjM32', NULL, NULL, NULL, '2019-08-12 20:50:14', '2019-08-12 20:50:14', NULL],
        [6, 'Huy', NULL, NULL, NULL, 'huy@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$ECqymyNicSRfGg8RM.vEwO00HtMD8Wtt0asmJQY7wwvaL8u3ZGkfG', NULL, NULL, NULL, '2019-08-12 20:51:56', '2019-08-12 20:51:56', NULL],
        [7, 'Nguyen Minh Quang [Aptech HN]', 'https://lh5.googleusercontent.com/-Fngkqxl96k8/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rcQgds6fE4N7bTKhq8MW9t6Pc2omg/photo.jpg', NULL, 'quangnmth1807056@fpt.edu.vn', 'quangnmth1807056@fpt.edu.vn', 0, 0, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', '100760073063692025938', '100760073063692025938', NULL, '2019-08-13 03:47:23', '2019-08-13 03:47:23', NULL],
        [8, 'QUANG MINH', 'https://lh3.googleusercontent.com/-fkyKvgV8lTg/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rf81odcPXOwQtTYij3O4gfA-hgukQ/photo.jpg', NULL, 'nminhquang0219@gmail.com', 'nminhquang0219@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', '103077451766870980776', '103077451766870980776', NULL, '2019-08-13 03:49:04', '2019-08-13 03:49:04', NULL],
        [9, 'Đặng Ngọc Phong', NULL, NULL, NULL, 'phongdn89@gmail.con', 1111105356859, 0, NULL, 1, NULL, '$2y$10$urq0O0ykayDWT8DDPdEwEuZPE6kvgv57XS/QU8IIm.XKgKiYw/nJm', NULL, NULL, NULL, '2019-08-13 08:24:04', '2019-08-21 13:59:42', NULL],
        [10, 'Vũ Hoàng Hải', NULL, NULL, NULL, 'hoanghai@gmail.com', 4700000, 0, NULL, 1, NULL, '$2y$10$r5CL3hPnqhFj2KAbm4E8ZeOtthyRSz3efcUi2.G.Ny8X5pmhyTrbu', NULL, NULL, NULL, '2019-08-13 10:33:34', '2019-08-23 13:23:04', NULL],
        [11, 'Phạm Duy Khánh', NULL, NULL, NULL, 'duykhanh@gmail.com', 0, -229.25, NULL, 1, NULL, '$2y$10$miBVu30BH0mM4wxuKzs2uO7CJGT0KGkb5HdyvrqhdiFmhQg.flB9W', NULL, NULL, NULL, '2019-08-14 07:25:38', '2019-08-21 05:53:26', NULL],
        [12, 'Nguyễn Lan Anh', NULL, NULL, NULL, 'lananh@gmail.comn', 100000, 0, NULL, 1, NULL, '$2y$10$0acQ06wIOjuco8uIfmIi7eWnzBMl2ijQ.GreCPlrhneN8kPckXYuW', NULL, NULL, NULL, '2019-08-16 02:04:38', '2019-08-23 16:10:33', NULL],
        [13, 'Vũ Thanh Hà', NULL, NULL, NULL, 'thanhha@gmail.comn', 130074134, -1157.8, NULL, 1, NULL, '$2y$10$X3KxboWBIdOFkDuTngpDse9qcezyPiZuvomE0QDiXUcKBWHV9aBYS', NULL, NULL, NULL, '2019-08-17 08:02:49', '2019-08-23 14:59:38', NULL],
        [14, 'Nguyễn Lan Phương', NULL, NULL, NULL, 'lanphuong@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$quFJYrN5itcpAsap9L0v6.lqcNK6iQbc2mJEfaeGxNNnri1aKOD76', NULL, NULL, NULL, '2019-08-23 17:08:22', '2019-08-23 17:08:22', NULL],
        [15, 'Nguyễn Cẩm Linh', NULL, NULL, NULL, 'camlinh@gmail.com', 0, 0, NULL, 1, NULL, '$2y$10$6MNZ6vo/O0A.8ouJofxxdO8VC3JTGD.zi90JgQDd65c0hk.4q0Avu', NULL, NULL, NULL, '2019-08-23 17:58:45', '2019-08-23 17:58:45', NULL],
    ];
        $result = [];
        foreach ($data as $item){
            $result[] =[
                'id'=>$item[0],
                'name'=>$item[1],
                'avatar'=>$item[2],
                'username'=>$item[4],
                'email'=>$item[5],
                'password'=>$item[11],
            ];
        }
        return $result;
    }
}
