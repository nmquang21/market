<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;
class product_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert($this->data());
    }
    public function data(){
        $data=[
            [88, 104, 62, NULL, NULL],
            [87, 104, 8, NULL, NULL],
            [86, 103, 38, NULL, NULL],
            [115, 118, 2, NULL, NULL],
            [116, 118, 20, NULL, NULL],
            [117, 119, 2, NULL, NULL],
            [119, 120, 2, NULL, NULL],
            [118, 119, 20, NULL, NULL],
            [120, 120, 21, NULL, NULL],
            [121, 121, 2, NULL, NULL],
            [122, 121, 20, NULL, NULL],
            [123, 122, 2, NULL, NULL],
            [124, 122, 20, NULL, NULL],
            [125, 123, 2, NULL, NULL],
            [126, 123, 21, NULL, NULL],
            [127, 124, 2, NULL, NULL],
            [128, 124, 22, NULL, NULL],
            [129, 125, 2, NULL, NULL],
            [131, 126, 2, NULL, NULL],
            [130, 125, 22, NULL, NULL],
            [133, 127, 1, NULL, NULL],
            [132, 126, 24, NULL, NULL],
            [135, 128, 1, NULL, NULL],
            [134, 127, 14, NULL, NULL],
            [136, 128, 16, NULL, NULL],
            [137, 129, 6, NULL, NULL],
            [138, 129, 51, NULL, NULL],
            [139, 130, 1, NULL, NULL],
            [89, 105, 2, NULL, NULL],
            [90, 105, 20, NULL, NULL],
            [91, 106, 1, NULL, NULL],
            [92, 106, 13, NULL, NULL],
            [93, 107, 10, NULL, NULL],
            [94, 107, 68, NULL, NULL],
            [95, 108, 5, NULL, NULL],
            [96, 108, 45, NULL, NULL],
            [97, 109, 4, NULL, NULL],
            [98, 109, 38, NULL, NULL],
            [99, 110, 1, NULL, NULL],
            [100, 110, 16, NULL, NULL],
            [101, 111, 2, NULL, NULL],
            [102, 111, 22, NULL, NULL],
            [103, 112, 8, NULL, NULL],
            [104, 112, 62, NULL, NULL],
            [105, 113, 1, NULL, NULL],
            [106, 113, 13, NULL, NULL],
            [107, 114, 1, NULL, NULL],
            [108, 114, 13, NULL, NULL],
            [109, 115, 2, NULL, NULL],
            [110, 115, 22, NULL, NULL],
            [111, 116, 6, NULL, NULL],
            [112, 116, 51, NULL, NULL],
            [113, 117, 2, NULL, NULL],
            [114, 117, 20, NULL, NULL],
            [140, 130, 14, NULL, NULL],
            [141, 131, 2, NULL, NULL],
            [142, 131, 22, NULL, NULL],
            [143, 132, 2, NULL, NULL],
            [144, 132, 20, NULL, NULL],
            [145, 133, 2, NULL, NULL],
            [146, 133, 25, NULL, NULL],
            [147, 134, 2, NULL, NULL],
            [148, 134, 25, NULL, NULL],
            [149, 135, 5, NULL, NULL],
            [150, 135, 46, NULL, NULL],
            [151, 136, 5, NULL, NULL],
            [152, 136, 45, NULL, NULL],
            [153, 137, 6, NULL, NULL],
            [154, 137, 51, NULL, NULL],
            [155, 138, 2, NULL, NULL],
            [156, 138, 20, NULL, NULL],
            [157, 139, 1, NULL, NULL],
            [158, 139, 17, NULL, NULL],
            [159, 140, 1, NULL, NULL],
            [160, 140, 14, NULL, NULL],
            [161, 141, 2, NULL, NULL],
            [162, 141, 25, NULL, NULL],
            [163, 142, 5, NULL, NULL],
            [164, 142, 45, NULL, NULL],
            [165, 143, 5, NULL, NULL],
            [166, 143, 45, NULL, NULL],
            [167, 144, 5, NULL, NULL],
            [168, 144, 47, NULL, NULL],
            [169, 145, 10, NULL, NULL],
            [170, 145, 69, NULL, NULL],
            [171, 146, 10, NULL, NULL],
            [172, 146, 67, NULL, NULL],
            [173, 147, 2, NULL, NULL],
            [174, 147, 20, NULL, NULL],
            [175, 148, 2, NULL, NULL],
            [176, 148, 27, NULL, NULL],
            [177, 149, 2, NULL, NULL],
            [178, 149, 27, NULL, NULL],
            [179, 150, 5, NULL, NULL],
            [180, 150, 45, NULL, NULL],
            [181, 151, 5, NULL, NULL],
            [182, 151, 45, NULL, NULL],
            [183, 152, 5, NULL, NULL],
            [184, 152, 45, NULL, NULL],
            [185, 153, 5, NULL, NULL],
            [186, 153, 45, NULL, NULL],
            [187, 154, 5, NULL, NULL],
            [188, 154, 45, NULL, NULL],
            [189, 155, 5, NULL, NULL],
            [190, 155, 47, NULL, NULL],
            [191, 156, 6, NULL, NULL],
            [192, 156, 53, NULL, NULL],
            [193, 157, 4, NULL, NULL],
            [194, 157, 36, NULL, NULL],
            [195, 158, 4, NULL, NULL],
            [196, 158, 36, NULL, NULL],
            [197, 159, 1, NULL, NULL],
            [198, 159, 17, NULL, NULL],
            [199, 160, 1, NULL, NULL],
            [200, 160, 16, NULL, NULL],
            [201, 161, 1, NULL, NULL],
            [202, 161, 16, NULL, NULL],
            [203, 162, 1, NULL, NULL],
            [204, 162, 18, NULL, NULL],
            [205, 163, 1, NULL, NULL],
            [206, 163, 18, NULL, NULL],
            [207, 164, 4, NULL, NULL],
            [208, 164, 37, NULL, NULL],
            [209, 165, 4, NULL, NULL],
            [210, 165, 40, NULL, NULL],
            [211, 166, 4, NULL, NULL],
            [212, 166, 41, NULL, NULL],
            [213, 167, 4, NULL, NULL],
            [214, 167, 43, NULL, NULL],
            [215, 168, 4, NULL, NULL],
            [216, 168, 41, NULL, NULL],
            [217, 169, 4, NULL, NULL],
            [218, 169, 39, NULL, NULL],
            [219, 170, 4, NULL, NULL],
            [220, 170, 39, NULL, NULL],
            [221, 171, 6, NULL, NULL],
            [222, 171, 51, NULL, NULL],
            [223, 172, 6, NULL, NULL],
            [224, 172, 51, NULL, NULL],
            [225, 173, 6, NULL, NULL],
            [226, 173, 52, NULL, NULL],
            [227, 174, 6, NULL, NULL],
            [228, 174, 52, NULL, NULL],
            [229, 175, 6, NULL, NULL],
            [230, 175, 52, NULL, NULL],
            [231, 176, 6, NULL, NULL],
            [232, 176, 52, NULL, NULL],
            [233, 177, 6, NULL, NULL],
            [234, 177, 52, NULL, NULL],
            [235, 178, 2, NULL, NULL],
            [236, 178, 21, NULL, NULL],
            [237, 179, 2, NULL, NULL],
            [238, 179, 21, NULL, NULL],
            [239, 180, 2, NULL, NULL],
            [240, 180, 22, NULL, NULL],
            [241, 181, 2, NULL, NULL],
            [242, 181, 20, NULL, NULL],
            [243, 182, 2, NULL, NULL],
            [244, 182, 20, NULL, NULL],
            [245, 183, 2, NULL, NULL],
            [246, 183, 20, NULL, NULL],
            [247, 184, 2, NULL, NULL],
            [248, 184, 25, NULL, NULL],
            [249, 185, 2, NULL, NULL],
            [250, 185, 26, NULL, NULL],
            [251, 186, 2, NULL, NULL],
            [252, 186, 21, NULL, NULL],
            [253, 187, 2, NULL, NULL],
            [254, 187, 21, NULL, NULL],
            [255, 188, 2, NULL, NULL],
            [256, 188, 20, NULL, NULL],
            [257, 189, 5, NULL, NULL],
            [258, 189, 50, NULL, NULL],
            [259, 190, 10, NULL, NULL],
            [260, 190, 72, NULL, NULL],
            [261, 191, 6, NULL, NULL],
            [262, 191, 52, NULL, NULL],
            [263, 192, 1, NULL, NULL],
            [264, 192, 17, NULL, NULL],
            [265, 193, 2, NULL, NULL],
            [266, 193, 20, NULL, NULL],
            [267, 194, 5, NULL, NULL],
            [268, 194, 47, NULL, NULL],
            [269, 195, 1, NULL, NULL],
            [270, 195, 14, NULL, NULL],
        ];
        $result=[];
        foreach ($data as $item){
            $result[] =[
                'product_id'=>$item[1],
                'category_id'=>$item[2],
            ];
        }
        return $result;
    }
}
