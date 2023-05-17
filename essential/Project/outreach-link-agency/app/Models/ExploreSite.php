<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class ExploreSite extends Model
{
    use HasFactory, HasUuids, FilterQueryString;

    protected $fillable = ['site_name', 'domain', 'price', 'domain_url', 'example_post_url', 'moz_domain_authority', 'moz_spam_score', 'ahref_domain_rating', 'ahref_organic_traffic', 'max_no_of_hyperlink', 'explore_publication_type_id', 'about'];

    protected $filters = ['sort', 'pivot_price'];

    public function pivot_price($query, $value)
    {
        $query->wherePivot('price', '=', $value);
    }

    public function explore_publication_type()
    {
        return $this->belongsTo(ExplorePublicationType::class);
    }

    public function hyperlink_type()
    {
        return $this->belongsToMany(HyperlinkType::class);
    }

    public function categories()
    {
        return $this->belongsToMany(ExploreCategory::class);
    }

    public function countries()
    {
        return $this->belongsToMany(ExploreCountry::class);
    }

    public function languages()
    {
        return $this->belongsToMany(ExploreLanguage::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('price');
    }

    public function coupon()
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function campaign()
    {
        return $this->belongsToMany(Campaign::class);
    }
}
