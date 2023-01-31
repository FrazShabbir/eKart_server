<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticeCategrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_category = new ArticleCategory();
        $article_category->title = 'news';
        $article_category->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $article_category->status = 'active'; 
        $article_category->save();

        $article_category = new ArticleCategory();
        $article_category->title = 'insights';
        $article_category->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $article_category->status = 'active'; 
        $article_category->save();


        $article_category = new ArticleCategory();
        $article_category->title = 'markets';
        $article_category->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $article_category->status = 'active'; 
        $article_category->save();

        $article_category = new ArticleCategory();
        $article_category->title = 'financialmarkets';
        $article_category->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $article_category->status = 'active'; 
        $article_category->save();

        $article_category = new ArticleCategory();
        $article_category->title = 'chemicalsandmaterials';
        $article_category->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $article_category->status = 'active'; 
        $article_category->save();

        
    }
}
