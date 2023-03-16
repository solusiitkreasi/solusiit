<?php

use App\Models\Backend\Menu;
use App\Models\Backend\Post;
use App\Models\Backend\Simanja;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menus = [
            ['en'=>['name'=>'about us'],'id'=>['name'=>'tentang kami'], 'parent_id'=>NULL,'type'=>Menu::TYPE_HYPERLINK],
            ['en'=>['name'=>'product'],'id'=>['name'=>'produk'], 'parent_id'=>NULL,'type'=>Menu::TYPE_PRODUCT],
            ['en'=>['name'=>'news & event'],'id'=>['name'=>'berita & event'], 'parent_id'=>NULL,'type'=>Menu::TYPE_ARTICLE],
            ['en'=>['name'=>'contact us'],'id'=>['name'=>'hubungi kami'], 'parent_id'=>NULL,'type'=>Menu::TYPE_HYPERLINK],
            ['en'=>['name'=>'our reseller'],'id'=>['name'=>'reseller kami'], 'parent_id'=>NULL,'type'=>Menu::TYPE_RESELLER],
            
        ];

        foreach ($menus as $row) {
            $menu = Menu::create($row);

            if($row['type'] == Menu::TYPE_HYPERLINK)
            {
                $post_data = [
                    'menu_id'=>$menu->id,
                    'en' =>$row['en'],
                    'id' =>$row['id'],
                ];
                
                Post::create($post_data);
            }

        }
    }
}
