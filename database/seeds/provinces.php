<?php

use Illuminate\Database\Seeder;
use App\Province;
class provinces extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['provinceid'=>'0', 'name'=>'Toàn Quốc'],
            ['provinceid'=>'01TTT','name'=> 'Thành phố Hà Nội'],
            ['provinceid'=>'02TTT','name'=> 'Tỉnh Hà Giang'],
            ['provinceid'=>'04TTT','name'=> 'Tỉnh Cao Bằng'],
            ['provinceid'=>'06TTT','name'=> 'Tỉnh Bắc Kạn'],
            ['provinceid'=>'08TTT','name'=> 'Tỉnh Tuyên Quang'],
            ['provinceid'=>'10TTT','name'=> 'Tỉnh Lào Cai'],
            ['provinceid'=>'11TTT','name'=> 'Tỉnh Điện Biên'],
            ['provinceid'=>'12TTT','name'=> 'Tỉnh Lai Châu'],
            ['provinceid'=>'14TTT','name'=> 'Tỉnh Sơn La'],
            ['provinceid'=>'15TTT','name'=> 'Tỉnh Yên Bái'],
            ['provinceid'=>'17TTT','name'=> 'Tỉnh Hòa Bình'],
            ['provinceid'=>'19TTT','name'=> 'Tỉnh Thái Nguyên'],
            ['provinceid'=>'20TTT','name'=> 'Tỉnh Lạng Sơn'],
            ['provinceid'=>'22TTT','name'=> 'Tỉnh Quảng Ninh'],
            ['provinceid'=>'24TTT','name'=> 'Tỉnh Bắc Giang'],
            ['provinceid'=>'25TTT','name'=> 'Tỉnh Phú Thọ'],
            ['provinceid'=>'26TTT','name'=> 'Tỉnh Vĩnh Phúc'],
            ['provinceid'=>'27TTT','name'=> 'Tỉnh Bắc Ninh'],
            ['provinceid'=>'30TTT','name'=> 'Tỉnh Hải Dương'],
            ['provinceid'=>'31TTT','name'=> 'Thành phố Hải Phòng'],
            ['provinceid'=>'33TTT','name'=> 'Tỉnh Hưng Yên'],
            ['provinceid'=>'34TTT','name'=> 'Tỉnh Thái Bình'],
            ['provinceid'=>'35TTT','name'=> 'Tỉnh Hà Nam'],
            ['provinceid'=>'36TTT','name'=> 'Tỉnh Nam Định'],
            ['provinceid'=>'37TTT','name'=> 'Tỉnh Ninh Bình'],
            ['provinceid'=>'38TTT','name'=> 'Tỉnh Thanh Hóa'],
            ['provinceid'=>'40TTT','name'=> 'Tỉnh Nghệ An'],
            ['provinceid'=>'42TTT','name'=> 'Tỉnh Hà Tĩnh'],
            ['provinceid'=>'44TTT','name'=> 'Tỉnh Quảng Bình'],
            ['provinceid'=>'45TTT','name'=> 'Tỉnh Quảng Trị'],
            ['provinceid'=>'46TTT','name'=> 'Tỉnh Thừa Thiên Huế'],
            ['provinceid'=>'48TTT','name'=> 'Thành phố Đà Nẵng'],
            ['provinceid'=>'49TTT','name'=> 'Tỉnh Quảng Nam'],
            ['provinceid'=>'51TTT','name'=> 'Tỉnh Quảng Ngãi'],
            ['provinceid'=>'52TTT','name'=> 'Tỉnh Bình Định'],
            ['provinceid'=>'54TTT','name'=> 'Tỉnh Phú Yên'],
            ['provinceid'=>'56TTT','name'=> 'Tỉnh Khánh Hòa'],
            ['provinceid'=>'58TTT','name'=> 'Tỉnh Ninh Thuận'],
            ['provinceid'=>'60TTT','name'=> 'Tỉnh Bình Thuận'],
            ['provinceid'=>'62TTT','name'=> 'Tỉnh Kon Tum'],
            ['provinceid'=>'64TTT','name'=> 'Tỉnh Gia Lai'],
            ['provinceid'=>'66TTT','name'=> 'Tỉnh Đắk Lắk'],
            ['provinceid'=>'67TTT','name'=> 'Tỉnh Đắk Nông'],
            ['provinceid'=>'68TTT','name'=> 'Tỉnh Lâm Đồng'],
            ['provinceid'=>'70TTT','name'=> 'Tỉnh Bình Phước'],
            ['provinceid'=>'72TTT','name'=> 'Tỉnh Tây Ninh'],
            ['provinceid'=>'74TTT','name'=> 'Tỉnh Bình Dương'],
            ['provinceid'=>'75TTT','name'=> 'Tỉnh Đồng Nai'],
            ['provinceid'=>'77TTT','name'=> 'Tỉnh Bà Rịa - Vũng Tàu'],
            ['provinceid'=>'79TTT','name'=> 'Thành phố Hồ Chí Minh'],
            ['provinceid'=>'80TTT','name'=> 'Tỉnh Long An'],
            ['provinceid'=>'82TTT','name'=> 'Tỉnh Tiền Giang'],
            ['provinceid'=>'83TTT','name'=> 'Tỉnh Bến Tre'],
            ['provinceid'=>'84TTT','name'=> 'Tỉnh Trà Vinh'],
            ['provinceid'=>'86TTT','name'=> 'Tỉnh Vĩnh Long'],
            ['provinceid'=>'87TTT','name'=> 'Tỉnh Đồng Tháp'],
            ['provinceid'=>'89TTT','name'=> 'Tỉnh An Giang'],
            ['provinceid'=>'91TTT','name'=> 'Tỉnh Kiên Giang'],
            ['provinceid'=>'92TTT','name'=> 'Thành phố Cần Thơ'],
            ['provinceid'=>'93TTT','name'=> 'Tỉnh Hậu Giang'],
            ['provinceid'=>'94TTT','name'=> 'Tỉnh Sóc Trăng'],
            ['provinceid'=>'95TTT','name'=> 'Tỉnh Bạc Liêu'],
            ['provinceid'=>'96TTT','name'=> 'Tỉnh Cà Mau']
        ];
        Province::insert($data);

    }
}
