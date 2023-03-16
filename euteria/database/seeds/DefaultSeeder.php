<?php

use App\Models\Backend\Post;
use App\Models\Backend\PostBrand;
use App\Models\Backend\PostCategory;
use App\Models\Backend\PostImage;
use App\Models\Utility\Testimony;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* POST BRAND */
        $brands = [
            [
                'name'=> 'Morita',
                'image'=>'storage/image/post-brand/test.png',
            ],
            [
                'name'=> 'Morita Morclean',
                'image'=>'storage/image/post-brand/test.png',
            ],
            [
                'name'=> 'Morita W Care U',
                'image'=>'storage/image/post-brand/test.png',
            ],
            [
                'name'=> 'Reseller Morita',
                'image'=>'storage/image/post-brand/test.png',
            ],
            [
                'name'=> 'Samaru',
                'image'=>'storage/image/post-brand/test.png',
            ],
            [
                'name'=> 'Morita Tape',
                'image'=>'storage/image/post-brand/test.png',
            ],
        ];

        foreach ($brands as $brand)
        {
            PostBrand::create($brand);
        }

        /* POST CATEGORY */
        $categories = [
            [
                'en'=>[
                    'name'=>'Hand Sanitizer',
                ],
                'id'=>[
                    'name'=> 'Pembersih Tangan'
                ],
                'image'=> 'storage/image/post-category/test-brand.png'
            ],
            [
                'en'=>[
                    'name'=>'Hand Soap',
                ],
                'id'=>[
                    'name'=> 'Sabun Tangan'
                ],
                'image'=> 'storage/image/post-category/test-brand.png'
            ],
            [
                'en'=>[
                    'name'=>'Dishwashing Liquid',
                ],
                'id'=>[
                    'name'=> 'Cairan Cuci Piring'
                ],
                'image'=> 'storage/image/post-category/test-brand.png'
            ],
            [
                'en'=>[
                    'name'=>'Floor Cleaner',
                ],
                'id'=>[
                    'name'=> 'Pembersih Lantai'
                ],
                'image'=> 'storage/image/post-category/test-brand.png'
            ],
            [
                'en'=>[
                    'name'=>'Tape',
                ],
                'id'=>[
                    'name'=> 'Isolasi'
                ],
                'image'=> 'storage/image/post-category/test-brand.png'
            ],
        ];

        foreach ($categories as $row)
        {
            PostCategory::create($row);
        }

        /* TESTIMONY */
        $testimonies = [
            [
                'en'=>[
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo aperiam quam sint iure amet soluta! Corrupti hic nesciunt vel laborum quod excepturi deleniti necessitatibus, tempore similique et magni cum quis.',
                ],
                'id'=>[
                    'description' => 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.',
                ],
                'name'=>'John Doe (2021)', 
                'status'=>1,
                'image'=>'/storage/image/testimony/sum4li-2021.png'
            ]
        ];

        foreach ($testimonies as $row)
        {
            Testimony::create($row);
        }

        /* NEWS EVENT */
        $news = [
            [
                'menu_id' => 3,
                'en' => [
                    'name'=>'GETALL CARE 202',
                    'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium iusto explicabo consequuntur harum facere sit facilis ullam voluptatibus quas. Architecto exercitationem voluptas nostrum quod iusto esse similique, hic odit velit.'
                ],
                'id' => [
                    'name'=>'GETALL CARE 202',
                    'description' => 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.'
                ],
                'post_date'=> date('Y-m-d')
            ]
        ];

        foreach ($news as $row)
        {
            for ($i=1; $i < 10; $i++) { 
                $row['en']['name'] = 'GETALL CARE 202'.$i;
                $row['id']['name'] = 'GETALL CARE 202'.$i;
                $images = [
                            'storage/image/post-brand/huhu.png',
                            'storage/image/post-brand/develop.png',
                            'storage/image/post-brand/test.png',
                            'storage/image/post-brand/test-brand.png'
                        ];
                $post = Post::create($row);
    
                foreach ($images as $image)
                {
                    $post_image = [
                        'post_id'=>$post->id,
                        'file_name'=>$image,
                        'file_size'=>4000,
                        'file_extension'=>'png',
                        'file_original_name'=>$image,
                    ];
    
                    PostImage::create($post_image);
                }
                
            }
        }
    }
}
