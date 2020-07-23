<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Todfsfdurism for everyone',
            'body' => 'Sweet candy canes oat cake apple pie carrot cake croissant. Sweet sugar plum candy chocolate marzipan candy canes apple pie macaroon danish. Cake powder dragée chocolate sesame snaps muffin. Cookie bonbon pie dessert.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/1.png')  ,
            'tag' => 'tourism',
            'user_id' => 2,
            'category_id' => 1,
        ]);

        Post::create([
            'title' => 'fdsfdsfd for everyone',
            'body' => '
            Cupcake ipsum dolor sit amet pastry. Jelly beans chocolate bar topping sesame snaps oat cake. Apple pie halvah halvah lollipop cupcake oat cake pudding.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/2.png') ,
            'tag' => 'physical_disabilities',
            'user_id' => 1,
            'category_id' => 3,
        ]);


        Post::create([
            'title' => 'Tourdsfsfdsism for everyone',
            'body' => '
            Cupcake ipsum dolor sit amet tart soufflé. I love powder apple pie gummies sweet. Cotton candy I love cotton candy danish muffin.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/3.jpeg') ,
            'tag' => 'visual_disabilities',
            'user_id' => 3,
            'category_id' => 4,
        ]);

        Post::create([
            'title' => 'sdfsfwerfgsad for everyone',
            'body' => 'Cupcake ipsum dolor sit amet bear claw. Danish marshmallow fruitcake macaroon chocolate cake jelly-o muffin cake. Jujubes powder chupa chups cheesecake chupa chups cheesecake croissant jujubes. Cake ice cream chupa chups powder cake apple pie gingerbread.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/4.jpeg'),
            'tag' => 'hearing_disabilities',
            'user_id' => 1,
            'category_id' => 5,
        ]);

        Post::create([
            'title' => 'asbdgQEGF for everyone',
            'body' => '
            Candy canes chocolate cake ice cream gummies I love tart powder biscuit. Cotton candy oat cake cookie chocolate bar gummi bears candy. Macaroon tiramisu wafer.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/5.jpeg') ,
            'tag' => 'tourism',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'JKL;OPJP for everyone',
            'body' => 'Danish macaroon candy. Jelly beans I love macaroon marshmallow I love sweet. Sesame snaps cake soufflé marzipan pie cookie I love sweet roll fruitcake. Gingerbread gummi bears gingerbread pudding I love chocolate dessert chocolate cake I love.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/6.jpeg') ,
            'tag' => 'mental_disabilities',
            'user_id' => 1,
            'category_id' => 5,
        ]);
        Post::create([
            'title' => 'KPOJKKL for everyone',
            'body' => 'Toffee dessert topping ice cream I love jelly cake topping lemon drops. Muffin tart jujubes I love fruitcake chocolate chocolate cake. Cookie I love cheesecake tiramisu biscuit tiramisu I love.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/7.jpeg') ,
            'tag' => 'mental_disabilities',
            'user_id' => 1,
            'category_id' => 5,
        ]);
        Post::create([
            'title' => 'UIHNCKHSUDGFJWEBFJ for everyone',
            'body' => 'Fruitcake chocolate marshmallow. Toffee ice cream lemon drops marshmallow sweet roll croissant caramels. Tootsie roll sweet dragée sugar plum I love candy gummi bears dragée carrot cake. Dessert marshmallow gingerbread candy canes wafer danish I love.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/8.jpeg') ,
            'tag' => 'mental_disabilities',
            'user_id' => 1,
            'category_id' => 5,
        ]);
        Post::create([
            'title' => 'Tourism for everyone',
            'body' => '
            Cookie brownie muffin. Biscuit cheesecake I love donut candy canes ice cream I love macaroon lollipop. Candy lemon drops I love liquorice cake halvah jelly.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/9.jpeg') ,
            'tag' => 'learning_disabilities',
            'user_id' => 1,
            'category_id' => 7,
        ]);

        Post::create([
            'title' => 'Tourism for everyone',
            'body' => 'Chocolate bar donut sweet roll. Cake marshmallow tiramisu powder gummies powder I love gummi bears bear claw. Halvah I love ice cream liquorice fruitcake I love icing sweet sweet roll. Lollipop croissant danish I love.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/10.png') ,
            'tag' => 'autism_disabilities',
            'user_id' => 1,
            'category_id' => 8,
        ]);

        Post::create([
            'title' => 'Tourism for everyone',
            'body' => 'Candy sweet pastry toffee candy chocolate powder donut jelly. Cookie ice cream candy canes fruitcake. Sesame snaps lemon drops dragée cake ice cream pudding jelly-o I love powder.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/11.jpeg') ,
            'tag' => 'autism_disabilities',
            'user_id' => 1,
            'category_id' => 8,
        ]);

        Post::create([
            'title' => 'Tourism for everyone',
            'body' => '
            Sesame snaps tart carrot cake bonbon I love cupcake jelly beans jelly halvah. Wafer cookie caramels topping. I love apple pie danish cake macaroon icing bonbon sweet roll dragée.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/12.jpeg') ,
            'tag' => 'intellectual_disabilities',
            'user_id' => 1,
            'category_id' => 6,
        ]);

        Post::create([
            'title' => 'Tourism for everyone',
            'body' => 'Cheesecake pudding cake I love. Cheesecake jelly I love jelly-o cookie jelly. I love chocolate I love danish wafer gummies candy canes toffee lemon drops. I love caramels brownie candy macaroon.',
            'image' => 'http://localhost:8000'. Storage::url('uploads/posts/13.jpeg') ,
            'tag' => 'learning_disabilities',
            'user_id' => 1,
            'category_id' => 7,
        ]);
    }
}
