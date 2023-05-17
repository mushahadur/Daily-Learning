<?php

namespace Database\Seeders;

use App\Models\ExploreCategory;
use App\Models\ExploreCountry;
use App\Models\HyperlinkType;
use App\Models\ExploreLanguage;
use App\Models\ExplorePublicationType;
use Carbon\Carbon;
use App\Models\ExploreSite;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExploreSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::pluck('id');
        $service_type = [];
        $country = ExploreCountry::first();
        $language = ExploreLanguage::first();
        $category = ExploreCategory::first();
        $publication = ExplorePublicationType::first();
        $hyperlink_type = HyperlinkType::first();
        $site = ExploreSite::create(
            [
                "id" => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                "site_name" => "cafe-powell",
                "domain" => "cafe-powell.com",
                "domain_url" => "http://cafe-powell.com",
                "site_name" => "cafe-powell",
                "example_post_url" => "http://cafe-powell.com",
                "moz_domain_authority" => "12",
                "moz_spam_score" => "22",
                "ahref_domain_rating" => "121",
                "ahref_organic_traffic" => "2323",
                "max_no_of_hyperlink" => "2",
                "explore_publication_type_id" => $publication->id,
                "about" => "<p>test</p>",
                "is_active" => "0",
                "created_at" => "2023-03-20 11:25:30",
                "updated_at" => "2023-03-20 11:25:30",
            ]
        );

        $site->categories()->sync([$category->id]);
        $site->countries()->sync([$country->id]);
        $site->languages()->sync([$language->id]);
        $site->hyperlink_type()->sync([$hyperlink_type->id]);

        foreach($services as $key => $val){
            $service_type[$val] = 100;
        }
        $service_types = collect($service_type)
            ->map(function ($service_type) {
                return ['price' => $service_type];
            });
        $site->services()->sync($service_types);
    }
}
