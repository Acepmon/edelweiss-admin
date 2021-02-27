<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\CollectionSeo;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TestCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->ftdCollections() as $ftdCollection) {
            $collection = Collection::factory()->state([
                'title' => $ftdCollection['title'],
                'desc' => $ftdCollection['desc'],
                'image' => null,
                'slug' => $ftdCollection['prefix'] . Str::slug($ftdCollection['title']),
            ])->create();

            CollectionSeo::factory()->state([
                'collection_id' => $collection->id,
                'seo_title' => $collection->title,
                'seo_desc' => Str::substr($collection->desc, 0, 320),
                'seo_url' => 'collection/' . $collection->slug,
            ])->create();

            $products = Product::inRandomOrder()->take(100)->pluck('id')->toArray();
            $collection->products()->attach($products);
        }

        // Collection::factory()->count(50)->create()->each(function ($collection) {
        //     CollectionSeo::factory()->state(['collection_id' => $collection->id])->create();

        //     $products = Product::inRandomOrder()->take(100)->pluck('id')->toArray();
        //     $collection->products()->attach($products);
        // });
    }

    private function ftdCollections()
    {
        return [
            [
                'prefix' => '',
                'title' => "Birthday Flowers",
                'desc' => "Your loved ones birthday is just around the corner and you need a gift that will sweep them off their feet, and who doesn't love receiving surprise birthday flowers? Happy birthday flowers can be the perfect way to show the loves of your life how much you care about their special day. Absolutely dazzle him or her with affection when birthday roses are delivered right to their home or office."
            ],
            [
                'prefix' => '',
                'title' => "Happy Birthday Roses",
                'desc' => "Nothing says ‘Happy Birthday’ quite like an arrangement of beautiful, vibrant roses. Whether you’re looking for a romantic bouquet for your partner, bright blooms for your favorite friend, or a classy gift for your favorite coworker, you can’t go wrong with a bouquet of happy birthday roses."
            ],
            [
                'prefix' => '',
                'title' => "Sympathy Flowers for the Home",
                'desc' => "Sympathy flowers are a sweet and tasteful way of showing compassion and support for someone who has lost a loved one. Even if you’re far away from those who are grieving, sending a sympathy bouquet to the bereaved lets them know that you’re thinking of them—even if you can’t visit them or attend the funeral. Our local florists craft heartfelt bereavement flowers, funeral sprays, and plant arrangements. No matter which arrangement you choose, our beautiful floral gifts will express your earnest condolences in a truly touching display."
            ],
            [
                'prefix' => '',
                'title' => "Birthday Gifts",
                'desc' => "At FTD, we know how important birthdays are. Browse our stunning selection of flowers and birthday gift baskets to find the perfect birthday surprise so you can send birthday gifts to all of those people you love."
            ],
            [
                'prefix' => '',
                'title' => "Best Selling Flowers and Floral Arrangements",
                'desc' => "When you’re sending your loved ones warm birthday wishes, showing a romantic gesture, or thanking someone, not just any flowers will do. At FTD, we have the best flower bouquets that will make a lasting impression on whoever you send them to. Order one of our top-selling flowers online today for quick and easy delivery!"
            ],
            [
                'prefix' => '',
                'title' => "Just Because Flowers and Gifts",
                'desc' => "At FTD, we have a variety of just because flowers you can send... just because! As you browse through our just because flowers and gifts, you’ll find the perfect gift for anyone in your life."
            ],
            [
                'prefix' => '',
                'title' => "Father’s Day Gift Baskets & Flowers",
                'desc' => "This Father’s Day, show dad how much you appreciate him with one of our uniquely curated Father’s Day gift delivery baskets. If you’re looking for a delicious treat, gorgeous flowers, and trustworthy delivery service, FTD’s Father’s Day baskets are a sure bet. Shop our selection now to find the perfect delivery gift today."
            ],
            [
                'prefix' => '',
                'title' => "Wedding Flowers & Bouquets - THE WEDDING EXPERTS",
                'desc' => "Marriage is one of the most beautiful and heart-warming occasions in life. FTD offers a wide selection of wedding flowers to say congratulations or thank you for the invite, to be used as centerpieces at a rehearsal dinner, for the bride to hold while she walks down the aisle, or any other wedding need you may have. Shop our selection of wedding flowers and order them online today, we can have them delivered as soon as you need."
            ],
            [
                'prefix' => '',
                'title' => "Green Plants",
                'desc' => "Bring the beauty of the great outdoors into your office or living room with fresh and lovely green plants from FTD. Scroll through our wide variety of options, pick the plant that makes the perfect gift (or self-gift, we won’t tell!), and order it directly to your recipient, on time and as healthy as if you’d bought it from the local nursery."
            ],
            [
                'prefix' => '',
                'title' => "Money Trees",
                'desc' => "Money trees are an incredibly popular gift. And no, these money trees are not kitschy potted branches with dollar bills clipped to it. Although that might be a fortunate sight for some, the visual pleasure is short-lived compared to having a real money tree delivered."
            ],
            [
                'prefix' => '',
                'title' => "Valentine’s Day Delivery",
                'desc' => "Valentine’s Day is the perfect time to remind your loved ones how much you care for them. Nothing says “I love you” quite like a romantic present that was planned-out ahead of time. This year, FTD can play Cupid by making Valentine’s Day delivery easy with our premium flower arrangements and gift baskets brought straight to your special someone’s door!"
            ],
            [
                'prefix' => '',
                'title' => "Funeral Plants",
                'desc' => "Saying goodbye to a loved one is always a difficult thing to do. Send funeral plants from FTD to pay tribute to the departed and show your love and support for the brokenhearted."
            ],
        ];
    }
}
