<?php

use Illuminate\Database\Seeder;
use App\Category;
class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert($this->data());
    }
    public function data(){
        $data=[
        [1, 'Xe cộ', 0, 'sports-car.png', NULL, NULL, NULL],
        [2, 'Đồ điện tử', 0, 'laptop.png', NULL, NULL, NULL],
        [3, 'Bất động sản', 0, 'skyline.png', NULL, NULL, NULL],
        [4, 'Mẹ và bé', 0, 'pregnant.png', NULL, NULL, NULL],
        [5, 'Thời trang, đồ cá nhân', 0, 'casual-t-shirt-.png', NULL, NULL, NULL],
        [6, 'Đồ gia dụng', 0, 'washing-machine.png', NULL, NULL, NULL],
        [7, 'Thú cưng', 0, 'dog.png', NULL, NULL, NULL],
        [8, 'Dịch vụ, du lịch', 0, 'air-transport.png', NULL, NULL, NULL],
        [9, 'Việc làm', 0, 'portfolio.png', NULL, NULL, NULL],
        [10, 'Thể thao, giải trí', 0, 'running.png', NULL, NULL, NULL],
        [11, 'Văn phòng, công nông nghiệp', 0, 'congnhiep.png', NULL, NULL, NULL],
        [12, 'Các loại khác', 0, 'other.png\r\n', NULL, NULL, NULL],
        [13, 'Ô tô', 1, '', NULL, NULL, NULL],
        [14, 'Xe máy', 1, '', NULL, NULL, NULL],
        [15, 'Xe tải, xe ben', 1, '', NULL, NULL, NULL],
        [16, 'Xe điện', 1, '', NULL, NULL, NULL],
        [17, 'Xe đạp', 1, '', NULL, NULL, NULL],
        [18, 'Phụ tùng xe', 1, '', NULL, NULL, NULL],
        [19, 'Phương tiện khác', 1, '', NULL, NULL, NULL],
        [20, 'Điện thoại', 2, '', NULL, NULL, NULL],
        [21, 'Máy tính bảng', 2, '', NULL, NULL, NULL],
        [22, 'laptop', 2, '', NULL, NULL, NULL],
        [23, 'Máy tính để bàn', 2, '', NULL, NULL, NULL],
        [24, 'Máy ảnh, máy quay', 2, '', NULL, NULL, NULL],
        [25, 'Tivi, âm thanh', 2, '', NULL, NULL, NULL],
        [26, 'Thiết bị đeo thông minh', 2, '', NULL, NULL, NULL],
        [27, 'Phụ kiện[Màn hình, chuột,...]', 2, '', NULL, NULL, NULL],
        [28, 'Linh kiện[Ram, ổ cứng]', 2, '', NULL, NULL, NULL],
        [32, 'Nhà ở, đất', 3, '', NULL, NULL, NULL],
        [31, 'Căn hộ, chung cư', 3, '', NULL, NULL, NULL],
        [33, 'Đất', 3, '', NULL, NULL, NULL],
        [34, 'Văn phòng, mặt bằng kinh doanh', 3, '', NULL, NULL, NULL],
        [35, 'Phòng trọ', 3, '', NULL, NULL, NULL],
        [36, 'Đồ chơi', 4, '', NULL, NULL, NULL],
        [37, 'Sữa, tã bỉm', 4, '', NULL, NULL, NULL],
        [38, 'Thời trang bầu', 4, '', NULL, NULL, NULL],
        [39, 'Đồ dùng cho bé', 4, '', NULL, NULL, NULL],
        [40, 'Sữa', 4, '', NULL, NULL, NULL],
        [41, 'Thời trang, phụ kiện cho bé', 4, '', NULL, NULL, NULL],
        [42, 'Sữa tắm, dầu gội', 4, '', NULL, NULL, NULL],
        [43, 'Nôi, giường, cũi', 4, '', NULL, NULL, NULL],
        [44, 'Xe đẩy', 4, '', NULL, NULL, NULL],
        [45, 'Quần áo', 5, '', NULL, NULL, NULL],
        [46, 'Đồng hồ', 5, '', NULL, NULL, NULL],
        [47, 'Giày dép', 5, '', NULL, NULL, NULL],
        [48, 'Túi sách', 5, '', NULL, NULL, NULL],
        [49, 'Nước hoa', 5, '', NULL, NULL, NULL],
        [50, 'Phụ kiện thời trang khác', 5, '', NULL, NULL, NULL],
        [51, 'Tủ lạnh, máy lạnh, máy giặt', 6, '', NULL, NULL, NULL],
        [52, 'Nội ngoại thất', 6, '', NULL, NULL, NULL],
        [53, 'Cây cảnh', 6, '', NULL, NULL, NULL],
        [54, 'Đồ gia dụng gia đình khác', 6, '', NULL, NULL, NULL],
        [55, 'Gà', 7, '', NULL, NULL, NULL],
        [56, 'Chó', 7, '', NULL, NULL, NULL],
        [57, 'Chim', 7, '', NULL, NULL, NULL],
        [58, 'Mèo', 7, '', NULL, NULL, NULL],
        [59, 'Thú cưng khác', 7, '', NULL, NULL, NULL],
        [60, 'Phụ kiện, thức ăn, dịch vụ', 7, '', NULL, NULL, NULL],
        [61, 'Dịch vụ', 8, '', NULL, NULL, NULL],
        [62, 'Du lịch', 8, '', NULL, NULL, NULL],
        [63, 'Tìm người làm', 9, '', NULL, NULL, NULL],
        [64, 'Tìm việc', 9, '', NULL, NULL, NULL],
        [67, 'Nhạc cụ', 10, '', NULL, NULL, NULL],
        [68, 'Sách', 10, '', NULL, NULL, NULL],
        [69, 'Đồ thể thao, Dã ngoại', 10, '', NULL, NULL, NULL],
        [70, 'Đồ sưu tầm, đồ cổ', 10, '', NULL, NULL, NULL],
        [71, 'Thiết bị chơi game', 10, '', NULL, NULL, NULL],
        [72, 'Dụng cụ thể thao', 10, '', NULL, NULL, NULL],
        [73, 'Sở thích khác', 10, '', NULL, NULL, NULL],
        [74, 'Đồ dùng văn phòng', 11, '', NULL, NULL, NULL],
        [75, 'Đồ chuyên dụng, Giống nuôi trồng', 11, '', NULL, NULL, NULL],
    ];

    $result = [];
    foreach ($data as $item){
        $result[] = [
            'id'=>$item[0],
            'name'=>$item[1],
            'parent_id'=>$item[2],
            'image'=>$item[3],
            'created_at'=>'2019-08-21 12:00:00',
            'updated_at'=>'2019-08-21 12:00:01',
            ];
    }
    return $result;

    }
}
