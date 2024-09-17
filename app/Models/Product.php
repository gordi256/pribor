<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Product extends Model
{

    use HasSEO;
    use HasSlug;
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];
/**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_kind_id');
    }

    public function kinds()
    {
        return $this->belongsTo(Product_kind::class, 'product_kind_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function analogies()
    {
        return $this->hasMany(Analog::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function composite()
    {
        return $this->hasMany(Product_composite_element::class);
    }


    //к какому комплекту товар относится
    public function parentComplectation()
    {
        return $this->belongsToMany(
            Product::class, // Модель связанных товаров
            'product_composite_elements', // Таблица связи
            'product_element_id',                // Внешний ключ для текущей модели в таблице связи
            'product_id'         // Внешний ключ для связанной модели в таблице связи
        )->as('elements'); // Добавляем алиас для связи
    }

    public function complectationQuantity()
    {
        return $this->hasMany(Product_composite_element::class, 'product_element_id', 'id');
    }



}
