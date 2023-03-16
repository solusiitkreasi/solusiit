<?php

namespace App\Models\Backend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    // use Sluggable;
    use LogsActivity;

    CONST TYPE_SOCMED = 'socmed';
    CONST TYPE_GENERAL = 'general';
    CONST TYPE_SEO = 'seo';
    CONST TYPE_BANNER = 'banner';
    CONST TYPE_HOMEPAGE = 'homepage';
    CONST TYPE_HOMEPAGE_ABOUT = 'homepage-about';
    CONST TYPE_HOMEPAGE_SERVICE = 'homepage-service';
    CONST TYPE_ABOUTPAGE = 'aboutpage';

    CONST VALUE_ADDRESS = 'Jl. Mesjid Bendungan 1 No.10, RW.7, Cawang, Kec. Kramat jati, Kota Jakarta Timur    <br>Daerah Khusus Ibukota Jakarta    <br>13630 ';
    CONST VALUE_WHATSAPP_NUMBER = '0812 - 1180 - 1703';
    CONST VALUE_MOBILE_NUMBER = '';
    CONST VALUE_PHONE_NUMBER = '021 - 8091787';
    CONST VALUE_EMAIL = 'cs@stmorita.com';
    CONST VALUE_FAX = '';
    CONST VALUE_GMAPS_EMBED = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2758264958825!2d107.14281931432423!3d-6.358333295398882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699a2ccf43eb25%3A0x6a7955178c09fd6!2sPT.%20St.%20Morita%20Industries!5e0!3m2!1sen!2sid!4v1633186638952!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
    CONST VALUE_LINK_SAMBUTAN_VIDEO = 'https://www.youtube.com/watch?v=9Lzfe3Wmn3s';
    CONST VALUE_FOOTER_ABOUT = 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.';
    CONST VALUE_FACEBOOK = 'https://www.facebook.com/moritagetall/';
    CONST VALUE_INSTAGRAM = 'https://www.instagram.com/moritagetall/';
    CONST VALUE_TWITTER = 'https://twitter.com';
    CONST VALUE_YOUTUBE = 'https://www.youtube.com/channel/UCPbQXwzh9CMIpfcT4mK4t6A';
    CONST VALUE_GOOGLE_META_VERIFICATION = '';
    CONST VALUE_GOOGLE_ANALYTICS = '';
    CONST VALUE_FACEBOOK_PIXEL = '';

    CONST VALUE_LOGO = 'frontend/images/logo.png';
    CONST VALUE_BANNER_ATAS = '';
    CONST VALUE_BANNER_TENGAH = '';
    CONST VALUE_BANNER_BAWAH = '';


    CONST HISTORY_EN_VALUE = 'In this current situation (Covid-19 Pandemic), As the economic condition decreases, it is also difficult for people to carry out activities outside the home, including buying Household & Sanitary products. From this problem, we have the innovation to become a service and product provider that can reach the community so that people can get the products without having to leave the house.Besides, the price is cheap and has high quality products';
    CONST HISTORY_ID_VALUE = 'Pada kondisi saat ini (Di masa pandemi covid), selain menurunnya tingkat ekonomi, masyarakat juga sulit untuk berkegiatan di luar rumah termasuk untuk membeli produk Household & Personal Care. Sehingga kami memiliki inovasi menjadi penyedia jasa dan produk yang dapat menjangkau masyarakat sehingga masyarakat dapat memperoleh produk kesehatan tanpa harus keluar rumah.dan ingin harganya murah dan berkualitas.';
    CONST VISION_EN_VALUE = 'Make people and their environment healthier and happier & to make GetAll a leading, competitive, innovative and environmentally friendly provider of Sanitary products.';
    CONST VISION_ID_VALUE = 'Menjadikan Manusia dan lingkungannya lebih sehat dan bahagia.Menjadikan GetAll sebagai penyedia produk Sanitasi yang terkemuka, kompetitif, inovatif, dan ramah lingkungan.';
    CONST MISION_EN_VALUE = 'Providing high quality household and sanitary products with affordable prices and beneficial to the health of many people. Providing health products that reach the public directly. Contribute to reducing plastic waste through the Household & Sanitary products refill program. Helps open business opportunities by becoming Morita\'s partner';
    CONST MISION_ID_VALUE = 'Menyediakan PKRT yang berkualitas dengan harga yang terjangkau dan dapat bermanfaat bagi kesehatan banyak orang. Menyediakan produk kesehatan yang menjangkau masyarakat secara langsung. Berkontribusi dalam mengurangi sampah plastik melalui program isi ulang produk perbekalan kesehatan rumah tangga (PKRT). Membantu membuka peluang usaha dengan menjadi mitra morita';

    CONST ABOUT_TITLE_EN_VALUE = 'GETALL';
    CONST ABOUT_TITLE_ID_VALUE = 'GETALL';
    CONST ABOUT_SUB_TITLE_EN_VALUE = 'Making Changes On Every Refill';
    CONST ABOUT_SUB_TITLE_ID_VALUE = 'Memberi Perubahan Pada Setiap Isi Ulang';
    CONST ABOUT_DESCRIPTION_EN_VALUE = 'Getall delivers refills for household products without plastic packaging straight to your door! The products sold are of very high quality and have a distribution permit from the Ministry of Health, Getall Saves Household Expenditures. Serving Retail and Wholesale Purchases. Opportunities to become Dealers/Agents and Distributors throughout Indonesia are open';
    CONST ABOUT_DESCRIPTION_ID_VALUE = 'Getall mengantarkan isi ulang untuk produk rumah tangga tanpa kemasan plastik langsung ke rumahmu! Produk yg dijual sangat berkualitas dan Memiliki Izin Edar Kemenkes, Getall Menghemat Pengeluaran Rumah Tangga. Melayani Pembelian Retail dan Grosir. Terbuka Kesempatan Menjadi Dealer/Agen dan Distributor di Seluruh Indonesia';

    CONST DESCRIPTION_1_EN_VALUE = 'Top up with GETALL and get our products (Hand sanitizer, hand soap, dishwasher, floor cleaner, etc.) at a cheaper price while reducing plastic waste and saving the earth.';
    CONST DESCRIPTION_1_ID_VALUE = 'Isi ulang dengan GETALL dan dapatkan produk kami (Hand sanitizer, hand soap, pencuci piring, pembersih lantai, dll) dengan harga yang lebih murah sekaligus mengurangi sampah plastik dan menyelamatkan bumi.';
    CONST DESCRIPTION_2_EN_VALUE = '<p><strong>GETALL delivers change straight to your home - on every refill Together we make cleaning and cleaning work worthwhile.</strong></p>';
    CONST DESCRIPTION_2_ID_VALUE = '<p><strong>GETALL mengantarkan perubahan langsung ke rumahmu - pada setiap isi ulang Bersama kita membuat kegiatan membersihkan dan pekerjaan sebagai tenaga kebersihan menjadi berharga.</strong></p>';
    CONST FACTORY_EN_VALUE = 'Products are supplied from the Cikarang factory';
    CONST FACTORY_ID_VALUE = 'Produk di supply dari pabrik Cikarang';
    CONST AGENT_EN_VALUE = 'Distribution to agents in each region';
    CONST AGENT_ID_VALUE = 'Distribusi ke agen setiap daerah';
    CONST ARMADA_EN_VALUE = 'Delivering products to homes/shops';
    CONST ARMADA_ID_VALUE = 'Mengantarkan produk kerumah-rumah/toko';
    CONST CONSUMER_EN_VALUE = 'PKRT consumers: housewives, residents of villages/housings, food stalls, etc. Tape: photocopy shops, stationery shops, etc.';
    CONST CONSUMER_ID_VALUE = 'Konsumen PKRT : ibu rumah tangga, warga perkampungan/ perumahan, warung makan, dst Tape : toko photocopy, toko alat tulis, dst';
    
    CONST ABOUT_1_EN_VALUE = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>
    <p>&nbsp;</p>
    <p><strong>VISION</strong></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>
    <p><strong>MISSION</strong></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>';
    CONST ABOUT_1_ID_VALUE = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>
    <p>&nbsp;</p>
    <p><strong>VISION</strong></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>
    <p><strong>MISSION</strong></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue praesent ultricies nisl, fermentum. Ut ultricies lectus a consequat, integer. Suscipit proin id quis interdum bibendum suscipit in magna. Scelerisque mauris volutpat etiam eu, duis auctor. Cum id nisl egestas lacus. Nisi nulla nec, id massa lacus. Ut neque leo lacus, vitae dignissim mattis pharetra phasellus aliquet. Elit aliquam neque, fames natoque lectus.</p>';
    CONST ABOUT_2_EN_VALUE = '<p>In this current situation (Covid-19 Pandemic), As the economic condition decreases, it is also difficult for people to carry out activities outside the home, including buying Household &amp; Sanitary products. From this problem, we have the innovation to become a service and product provider that can reach the community so that people can get the products without having to leave the house.Besides, the price is cheap and has&nbsp;high quality products. And now GetAll programs are established.</p>
    <p><strong>VISION</strong></p>
    <ul>
    <li>Make people and their environment healthier and happier.</li>
    <li>To make GetAll a leading, competitive, innovative and environmentally friendly provider of Sanitary products.</li>
    </ul>
    <p><strong>MISSION</strong></p>
    <ul>
    <li>Providing high quality household and sanitary products with affordable prices and beneficial to the health of many people.</li>
    <li>Providing health products that reach the public directly.</li>
    <li>Contribute to reducing plastic waste through the Household &amp; Sanitary products refill program</li>
    <li>Helps open business opportunities by becoming Morita\'s partner</li>
    </ul>';
    CONST ABOUT_2_ID_VALUE = '<p style="text-align: justify;">Pada kondisi saat ini (Di masa pandemi covid), selain menurunnya tingkat ekonomi, masyarakat juga sulit untuk berkegiatan di luar rumah termasuk untuk membeli produk Household &amp; Personal Care. Sehingga kami memiliki inovasi menjadi penyedia jasa dan produk yang dapat menjangkau masyarakat sehingga masyarakat dapat memperoleh produk kesehatan tanpa harus keluar rumah.dan ingin harganya murah dan berkualitas. Dari masalah tersebut terwujudlah ide GetAll</p>
    <p><strong>VISI</strong></p>
    <ul>
    <li>Menjadikan Manusia dan lingkungannya lebih sehat dan bahagia.</li>
    <li>Menjadikan GetAll sebagai penyedia produk Sanitasi yang terkemuka, kompetitif, inovatif, dan ramah lingkungan.&nbsp;</li>
    </ul>
    <p><strong>MISI</strong></p>
    <ul>
    <li>Menyediakan PKRT yang berkualitas dengan harga yang terjangkau dan dapat bermanfaat bagi kesehatan banyak orang.</li>
    <li>Menyediakan produk kesehatan yang menjangkau masyarakat secara langsung</li>
    <li>Berkontribusi dalam mengurangi sampah plastik melalui program isi ulang produk perbekalan kesehatan rumah tangga (PKRT)</li>
    <li>Membantu membuka peluang usaha dengan menjadi mitra morita</li>
    </ul>';

    

    
    

    protected $table = 'settings';
    protected $fillable = ['name','type','value','status','form','icon','display_name'];
    /* ACTIVITY LOG */
    protected static $logName = 'setting';
    protected static $logAttributes = ['name', 'type','value','status'];

    public static function list()
    {
        return [
            self::generateList('logo','Logo',self::VALUE_LOGO,self::TYPE_GENERAL,1,'file','fa fa-file'),
            self::generateList('address','Alamat',self::VALUE_ADDRESS,self::TYPE_GENERAL,1,'text','fa fa-map-marker-alt'),
            // self::generateList('whatsapp_number','Whatsapp',self::VALUE_WHATSAPP_NUMBER,self::TYPE_GENERAL,0,'text','fa fa-whatsapp'),
            // self::generateList('mobile_number','Nomer Seluler',self::VALUE_MOBILE_NUMBER,self::TYPE_GENERAL,0,'text','fa fa-mobile'),
            self::generateList('phone_number','Nomer Telepon',self::VALUE_PHONE_NUMBER,self::TYPE_GENERAL,1,'text','fa fa-phone'),
            self::generateList('email','Email',self::VALUE_EMAIL,self::TYPE_GENERAL,1,'text','fa fa-envelope'),
            // self::generateList('fax','Fax',self::VALUE_EMAIL,self::TYPE_GENERAL,0,'text','fa fa-fax'),
            self::generateList('gmaps_embed','Gmaps Embed',self::VALUE_GMAPS_EMBED,self::TYPE_GENERAL,1,'textarea','fa fa-map-marker-alt'),
            
            /* HOMEPAGE HISTORY, VISION, MISION */
            self::generateList('history_en','History <span class="flag-icon flag-icon-us"></span>',self::HISTORY_EN_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            self::generateList('history_id','History <span class="flag-icon flag-icon-id"></span>',self::HISTORY_ID_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            self::generateList('vision_en','Vision <span class="flag-icon flag-icon-us"></span>',self::VISION_EN_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            self::generateList('vision_id','Vision <span class="flag-icon flag-icon-id"></span>',self::VISION_ID_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            self::generateList('mision_en','Mision <span class="flag-icon flag-icon-us"></span>',self::MISION_EN_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            self::generateList('mision_id','Mision <span class="flag-icon flag-icon-id"></span>',self::MISION_ID_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),

            /* HOMEPAGE ABOUT */
            self::generateList('about_title_en','Home About Title <span class="flag-icon flag-icon-us"></span>',self::ABOUT_TITLE_EN_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'text','fa fa-file'),
            self::generateList('about_title_id','Home About Title <span class="flag-icon flag-icon-id"></span>',self::ABOUT_TITLE_ID_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'text','fa fa-file'),
            self::generateList('about_sub_title_en','Home About Sub Title <span class="flag-icon flag-icon-us"></span>',self::ABOUT_SUB_TITLE_EN_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'text','fa fa-file'),
            self::generateList('about_sub_title_id','Home About Sub Title <span class="flag-icon flag-icon-id"></span>',self::ABOUT_SUB_TITLE_ID_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'text','fa fa-file'),
            self::generateList('about_description_en','Home About Description Title <span class="flag-icon flag-icon-us"></span>',self::ABOUT_DESCRIPTION_EN_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'textarea','fa fa-file'),
            self::generateList('about_description_id','Home About Description Title <span class="flag-icon flag-icon-id"></span>',self::ABOUT_DESCRIPTION_ID_VALUE,self::TYPE_HOMEPAGE_ABOUT,1,'textarea','fa fa-file'),
            self::generateList('about_image','Home About Image','',self::TYPE_HOMEPAGE_ABOUT,1,'file','fa fa-file'),

            /* HOMEPAGE SERVICE */
            self::generateList('description_1_en','Description 1 <span class="flag-icon flag-icon-us"></span>',self::DESCRIPTION_1_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('description_1_id','Description 1 <span class="flag-icon flag-icon-id"></span>',self::DESCRIPTION_1_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('description_2_en','Description 2 <span class="flag-icon flag-icon-us"></span>',self::DESCRIPTION_2_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('description_2_id','Description 2 <span class="flag-icon flag-icon-id"></span>',self::DESCRIPTION_2_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('factory_en','Factory <span class="flag-icon flag-icon-us"></span>',self::FACTORY_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('factory_id','Factory <span class="flag-icon flag-icon-id"></span>',self::FACTORY_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('reseller_en','Reseller <span class="flag-icon flag-icon-us"></span>',self::AGENT_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('reseller_id','Reseller <span class="flag-icon flag-icon-id"></span>',self::AGENT_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('armada_en','Armada <span class="flag-icon flag-icon-us"></span>',self::ARMADA_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('armada_id','Armada <span class="flag-icon flag-icon-id"></span>',self::ARMADA_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('consumer_en','Consumer <span class="flag-icon flag-icon-us"></span>',self::CONSUMER_EN_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),
            self::generateList('consumer_id','Consumer <span class="flag-icon flag-icon-id"></span>',self::CONSUMER_ID_VALUE,self::TYPE_HOMEPAGE_SERVICE,1,'textarea','fa fa-file'),

            self::generateList('factory_image','Factory Image','/frontend/images/service-1.png',self::TYPE_HOMEPAGE_SERVICE,1,'file','fa fa-file'),
            self::generateList('reseller_image','Reseller Image','/frontend/images/service-2.png',self::TYPE_HOMEPAGE_SERVICE,1,'file','fa fa-file'),
            self::generateList('armada_image','Armada Image','/frontend/images/service-3.png',self::TYPE_HOMEPAGE_SERVICE,1,'file','fa fa-file'),
            self::generateList('consumer_image','Consumer Image','/frontend/images/service-4.png',self::TYPE_HOMEPAGE_SERVICE,1,'file','fa fa-file'),
            
            



            // self::generateList('home_about_en','Mision <span class="flag-icon flag-icon-us"></span>',self::MISION_EN_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),
            // self::generateList('home_about_id','Mision <span class="flag-icon flag-icon-id"></span>',self::MISION_ID_VALUE,self::TYPE_HOMEPAGE,1,'textarea','fa fa-file'),


            /* ABOUT PAGE */
            self::generateList('about_main_image','About Main Image','',self::TYPE_ABOUTPAGE,1,'file','fa fa-file'),
            self::generateList('about_1_image','About 1 Image','',self::TYPE_ABOUTPAGE,1,'file','fa fa-file'),
            self::generateList('about_2_image','About 2 Image','',self::TYPE_ABOUTPAGE,1,'file','fa fa-file'),
            self::generateList('about_1_en','About 1 <span class="flag-icon flag-icon-us"></span>',self::ABOUT_1_EN_VALUE,self::TYPE_ABOUTPAGE,1,'textarea','fa fa-file'),
            self::generateList('about_1_id','About 1 <span class="flag-icon flag-icon-id"></span>',self::ABOUT_1_ID_VALUE,self::TYPE_ABOUTPAGE,1,'textarea','fa fa-file'),
            self::generateList('about_2_en','About 2 <span class="flag-icon flag-icon-us"></span>',self::ABOUT_2_EN_VALUE,self::TYPE_ABOUTPAGE,1,'textarea','fa fa-file'),
            self::generateList('about_2_id','About 2 <span class="flag-icon flag-icon-id"></span>',self::ABOUT_2_ID_VALUE,self::TYPE_ABOUTPAGE,1,'textarea','fa fa-file'),


            

            self::generateList('facebook','Facebook',self::VALUE_FACEBOOK,self::TYPE_SOCMED,1,'text','fa fa-facebook'),
            self::generateList('instagram','Instagram',self::VALUE_INSTAGRAM,self::TYPE_SOCMED,1,'text','fa fa-instagram'),
            // self::generateList('twitter','Twitter',self::VALUE_TWITTER,self::TYPE_SOCMED,1,'text','fa fa-twitter'),
            self::generateList('whatsapp_number','Whatsapp',self::VALUE_WHATSAPP_NUMBER,self::TYPE_SOCMED,1,'text','fa fa-whatsapp'),
            self::generateList('youtube','Youtube',self::VALUE_YOUTUBE,self::TYPE_SOCMED,1,'text','fa fa-youtube'),

            self::generateList('meta_title','Google Meta Title','',self::TYPE_SEO,1,'textarea','fa fa-google'),
            self::generateList('meta_description','Google Meta Description','',self::TYPE_SEO,1,'textarea','fa fa-google'),
            self::generateList('meta_keywords','Google Meta Keywords','',self::TYPE_SEO,1,'textarea','fa fa-google'),
            self::generateList('google_meta_verification','Google Meta Verification',self::VALUE_GOOGLE_META_VERIFICATION,self::TYPE_SEO,1,'textarea','fa fa-google'),
            self::generateList('google_analytics','Google Analytics',self::VALUE_GOOGLE_ANALYTICS,self::TYPE_SEO,1,'textarea','fa fa-google'),
            self::generateList('facebook_pixel','Facebook Pixel',self::VALUE_FACEBOOK_PIXEL,self::TYPE_SEO,1,'textarea','fa fa-facebook'),
        ];
    }

    public static function generateList($name,$display_name,$value,$type,$status,$form,$icon)
    {
        return [
            'name' => $name,
            'display_name' => $display_name,
            'type' => $type,
            'status' => $status,
            'form' => $form,
            'icon' => $icon,
            'value' => $value,
        ];
    }

    public function scopeActiveSetting($query)
    {
        return $query->whereStatus(1)->get();
    }

    public function scopeActive($query,$type)
    {
        return $query->whereType($type)->whereStatus(1)->get();
    }

    public function scopeActiveSocmed($query)
    {
        return $query->whereType(self::TYPE_SOCMED)->whereStatus(1)->get();
    }

    public function scopeActiveGeneral($query)
    {
        return $query->whereType(self::TYPE_GENERAL)->whereStatus(1)->get();
    }

    public function scopeActiveSeo($query)
    {
        return $query->whereType(self::TYPE_SEO)->whereStatus(1)->get();
    }

    public function scopeActiveBanner($query)
    {
        return $query->whereType(self::TYPE_BANNER)->whereStatus(1)->get();
    }

    public static function generateYoutubeEmbedLink($url)
    {
        $default_link =  self::VALUE_LINK_SAMBUTAN_VIDEO;
        if($url)
        {
            $link = explode('watch?v=',$url);
            if(count($link) > 1)
            {
                $link = explode('&t',$link[1]);
            }else{
                $link = explode('watch?v=',$default_link);
                $link = explode('&t',$link[1]);
            }
        }else{
            $link = explode('watch?v=',$default_link);
            $link = explode('&t',$link[1]);
        }
        $embed_link = "https://www.youtube.com/embed/".$link[0];
        return $embed_link;
    }

    public static function generateWhatsappLink($number, $text ='Hi dengan Get All disini', $country_number = '+62')
    {
        $number = trim($number);
        $number = str_replace('-','',$number);
        $number = str_replace(' ','',$number);

        $first_number = substr($number,0,1);
        
        if($first_number == '0')
        {
            $number = ltrim($number,0);
            $number = $country_number.$number;
        }else{
            $number = $country_number.$number;
        }

        $wa_link = 'https://wa.me/';

        $wa_link .= $number;
        $wa_link .= '?text=';
        $wa_link .= urlencode($text);

        return $wa_link;
        
    }

    public static function getValue($name)
    {
        $data = self::where('name',$name)->first();

        if($data)
        {
            return $data->value;
        }

        return '-';
    }


    public static function type()
    {
        return [
            self::TYPE_SOCMED => 'Social Media',
            self::TYPE_GENERAL => 'General',
            self::TYPE_SEO => 'SEO',
            self::TYPE_HOMEPAGE => 'Homepage',
            self::TYPE_HOMEPAGE_ABOUT => 'Homepage About',
            self::TYPE_HOMEPAGE_SERVICE => 'Homepage Service',
            self::TYPE_ABOUTPAGE => 'Aboutpage',
        ];
    }

    public static function form()
    {
        return [
            'text'=>'Text',
            'textarea'=>'Textarea',
            'file'=>'File'
        ];
    }
    
}
