<?php

namespace Database\Seeders;

use App\Models\FdItem;
use App\Models\FdPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FdItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items =[
            [
                'id'=>1,
                'title'=>'Grape',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 4.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'status'=>1,
                'fd_category_id' => 1,
                'picture'=>[
                    'id'=>1,
                    'url' =>'/theme/img/fruits/1.Grapes.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>2,
                'title'=>'Blueberry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 20.55,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>2,
                    'url' =>'/theme/img/fruits/2.Blueberry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>3,
                'title'=>'Raspberry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 14.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>3,
                    'url' =>'/theme/img/fruits/3.Raspberry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>4,
                'title'=>'Cranberry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 2.02,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>4,
                    'url' =>'/theme/img/fruits/4.Cranberry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>5,
                'title'=>'Blackberry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 80.2,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>5,
                    'url' =>'/theme/img/fruits/5.Blackberry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>6,
                'title'=>'Strawberry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 100,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>6,
                    'url' =>'/theme/img/fruits/6.Strawberry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>7,
                'title'=>'Kiwi',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 30.58,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 1,
                'status'=>1,
                'picture'=>[
                    'id'=>7,
                    'url' =>'/theme/img/fruits/7.Kiwifruit.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>8,
                'title'=>'Orange',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 25,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 2,
                'status'=>1,
                'picture'=>[
                    'id'=>8,
                    'url' =>'/theme/img/fruits/8.Orange.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>9,
                'title'=>'Lemon',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 78.14,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 2,
                'status'=>1,
                'picture'=>[
                    'id'=>9,
                    'url' =>'/theme/img/fruits/9.Lemon.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>10,
                'title'=>'Lime',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 12.44,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 2,
                'status'=>1,
                'picture'=>[
                    'id'=>10,
                    'url' =>'/theme/img/fruits/10.Lime.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>11,
                'title'=>'Grapefruit',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 33.44,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 2,
                'status'=>1,
                'picture'=>[
                    'id'=>11,
                    'url' =>'/theme/img/fruits/11.Grapefruit.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>12,
                'title'=>'Apple',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 78.55,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>12,
                    'url' =>'/theme/img/fruits/12.Apple.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>13,
                'title'=>'Pear',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 85.66,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>13,
                    'url' =>'/theme/img/fruits/13.Pear.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>14,
                'title'=>'Cherry',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 96.22,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>14,
                    'url' =>'/theme/img/fruits/14.Cherry.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>15,
                'title'=>'Peach',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 56.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>15,
                    'url' =>'/theme/img/fruits/15.Peach.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>16,
                'title'=>'Plum',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 78.15,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>16,
                    'url' =>'/theme/img/fruits/16.Plum.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>17,
                'title'=>'Apricot',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 23.25,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>17,
                    'url' =>'/theme/img/fruits/17.apricot.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>18,
                'title'=>'Mango',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 47.10,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 3,
                'status'=>1,
                'picture'=>[
                    'id'=>18,
                    'url' =>'/theme/img/fruits/18.Mango.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>19,
                'title'=>'Banana',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 56.23,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>19,
                    'url' =>'/theme/img/fruits/19.Banana.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>20,
                'title'=>'Pineapple',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 66.58,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>20,
                    'url' =>'/theme/img/fruits/20.Pineapple.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>21,
                'title'=>'Papaya',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 99.22,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>21,
                    'url' =>'/theme/img/fruits/21.Papaya.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>22,
                'title'=>'Avocado',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 29.74,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>22,
                    'url' =>'/theme/img/fruits/22.Avocado.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>23,
                'title'=>'Lychee',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 36.55,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>23,
                    'url' =>'/theme/img/fruits/23.Lychee.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>24,
                'title'=>'Passionfruit',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 48.55,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 4,
                'status'=>1,
                'picture'=>[
                    'id'=>24,
                    'url' =>'/theme/img/fruits/24.passionfruit.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>25,
                'title'=>'Watermelon',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 54.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 5,
                'status'=>1,
                'picture'=>[
                    'id'=>25,
                    'url' =>'/theme/img/fruits/25.Watermelon.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>26,
                'title'=>'Cantaloupe',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 64.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 5,
                'status'=>1,
                'picture'=>[
                    'id'=>26,
                    'url' =>'/theme/img/fruits/26.Cantaloupe.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>27,
                'title'=>'Fig',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 74.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 5,
                'status'=>1,
                'picture'=>[
                    'id'=>27,
                    'url' =>'/theme/img/fruits/27.Fig.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>28,
                'title'=>'Guava',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 84.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 5,
                'status'=>1,
                'picture'=>[
                    'id'=>28,
                    'url' =>'/theme/img/fruits/28.guava.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>29,
                'title'=>'Coconut',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 94.33,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 6,
                'status'=>1,
                'picture'=>[
                    'id'=>29,
                    'url' =>'/theme/img/fruits/29.Coconut.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ],
            [
                'id'=>30,
                'title'=>'Date',
                'card_tag' => 'fruits',
                'card_info' => 'default card information about the fruit', 
                'unit_price' => 13,
                'ratings' => 4,
                'summary' => 'Detailed summary about the fruit',
                'description' => "Full description about the fruit",
                'isAvailable' =>1,
                'fd_category_id' => 6,
                'status'=>1,
                'picture'=>[
                    'id'=>30,
                    'url' =>'/theme/img/fruits/30.date.jpg',
                    'alt' =>'',
                    'thumbnail_url' =>''
                ]
            ]
        ];
        
        foreach ($items as $item)
        {
            $fdItem = new FdItem();

            $fdItem->id = $item['id'];            
            $fdItem->title = $item['title'];
            $fdItem->card_tag = $item['card_tag'];
            $fdItem->card_info= $item['card_info'];
            $fdItem->unit_price= $item['unit_price'];
            $fdItem->ratings= $item['ratings'];
            $fdItem->summary= $item['summary'];
            $fdItem->description= $item['description'];
            $fdItem->isAvailable= $item['isAvailable'];
            $fdItem->fd_category_id= $item['fd_category_id'];
            $fdItem->status= $item['status'];
            $fdItem->save();

            $fdPicture = new FdPicture();
            $fdPicture->id = $item['picture']['id'];
            $fdPicture->url= $item['picture']['url'];
            $fdPicture->alt= $item['picture']['alt'];
            $fdPicture->thumbnail_url= $item['picture']['thumbnail_url'];
            $fdPicture->fd_item_id= $item['id'];
            $fdPicture->save();           
        }
    }
}
