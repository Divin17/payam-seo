<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

// use App\Models\CountryUserTypeProviderService;

class Country extends Model
{
    use HasFactory, HasSlug;

    // public $translatable = ['name', 'slug'];
    protected $fillable = ['name', 'flag', 'currency', 'title', 'description', 'priority', 'metatags', 'status', 'slug', 'published'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');

        // return SlugOptions::createWithLocales(['en', 'fr'])
        //     ->generateSlugsFrom(function ($model, $locale) {
        //         return "{$locale} {$model->id}";
        //     })
        //     ->saveSlugsTo('slug');
    }
    public function countryStps()
    {
        return $this->hasMany(CountryStp::class);
    }
    public function countryNetworks()
    {
        return $this->hasMany(CountryNetwork::class);
    }
    public function countryProviders()
    {
        return $this->hasMany(CountryProvider::class);
    }
    public function countryServices()
    {
        return $this->hasMany(CountryService::class);
    }
    public function countryUserTypes()
    {
        return $this->hasMany(CountryUserType::class);
    }
    public function countryProviderUserTypes()
    {
        return $this->hasMany(CountryProviderUserType::class);
    }
    public function countryProviderUserTypeVps()
    {
        return $this->hasMany(CountryProviderUserTypeVp::class);
    }
    public function countryProviderUserTypeStps()
    {
        return $this->hasMany(CountryProviderUserTypeStp::class);
    }
    public function countryUserTypeServices()
    {
        return $this->hasMany(CountryUserTypeService::class);
    }
    public function countryUserTypeProviderServices()
    {
        return $this->hasMany(CountryUserTypeProviderService::class);
    }
    public function countryProviderUserTypeServices()
    {
        return $this->hasMany(CountryProviderUserTypeService::class);
    }
    public function countryProviderUserTypeServiceVps()
    {
        return $this->hasMany(CountryProviderUserTypeServiceVp::class);
    }
    public function countryProviderUserTypeServiceStps()
    {
        return $this->hasMany(CountryProviderUserTypeServiceStp::class);
    }
    public function countryProviderServices()
    {
        return $this->hasMany(CountryProviderService::class);
    }
    public function countryProviderServiceVps()
    {
        return $this->hasMany(CountryProviderServiceVp::class);
    }
    public function countryProviderServiceStps()
    {
        return $this->hasMany(CountryProviderServiceStp::class);
    }
    public function countryValuePropositions()
    {
        return $this->hasMany(CountryValueProposition::class);
    }
    public function countryNetworkVps()
    {
        return $this->hasMany(CountryNetworkVp::class);
    }
    public function countryNetworkStps()
    {
        return $this->hasMany(CountryNetworkStp::class);
    }
    public function countryProviderVps()
    {
        return $this->hasMany(CountryProviderVp::class);
    }
    public function countryProviderStps()
    {
        return $this->hasMany(CountryProviderStp::class);
    }
    public function countryUserTypeProviders()
    {
        return $this->hasMany(CountryUserTypeProvider::class);
    }
    public function countryServiceVps()
    {
        return $this->hasMany(CountryServiceVp::class);
    }
    public function countryServiceStps()
    {
        return $this->hasMany(CountryServiceStp::class);
    }
    public function countryUserTypeVps()
    {
        return $this->hasMany(CountryUserTypeVp::class);
    }
    public function countryUserTypeStps()
    {
        return $this->hasMany(CountryUserTypeStp::class);
    }
    public function countryUserTypeServiceVps()
    {
        return $this->hasMany(CountryUserTypeServiceVp::class);
    }
    public function countryUserTypeServiceStps()
    {
        return $this->hasMany(CountryUserTypeServiceStp::class);
    }
    public function countryUserTypeProviderVps()
    {
        return $this->hasMany(CountryUserTypeProviderVp::class);
    }
    public function countryUserTypeProviderStps()
    {
        return $this->hasMany(CountryUserTypeProviderStp::class);
    }
    public function countryUserTypeProviderServiceVps()
    {
        return $this->hasMany(CountryUserTypeProviderServiceVp::class);
    }
    public function countryUserTypeProviderServiceStps()
    {
        return $this->hasMany(CountryUserTypeProviderServiceStp::class);
    }
    public function addCountryStp($data)
    {
        return $this->countryStps()->create($data);
    }
    public function addCountryNetwork($data)
    {
        return $this->countryNetworks()->create($data);
    }
    public function addCountryProvider($data)
    {
        return $this->countryProviders()->create($data);
    }
    public function addCountryService($data)
    {
        return $this->countryServices()->create($data);
    }
    public function addCountryUserType($data)
    {
        return $this->countryUserTypes()->create($data);
    }
    public function addCountryUserTypeProvider($data)
    {
        return $this->countryUserTypeProviders()->create($data);
    }
    public function addCountryUserTypeService($data)
    {
        return $this->countryUserTypeServices()->create($data);
    }
    public function addCountryUserTypeProviderService($data)
    {
        return $this->countryUserTypeProviderServices()->create($data);
    }
    public function addCountryProviderUserTypeService($data)
    {
        return $this->countryProviderUserTypeServices()->create($data);
    }
    public function addCountryProviderUserTypeServiceVp($data)
    {
        return $this->countryProviderUserTypeServiceVps()->create($data);
    }
    public function addCountryProviderUserTypeServiceStp($data)
    {
        return $this->countryProviderUserTypeServiceStps()->create($data);
    }
    public function addCountryProviderUserType($data)
    {
        return $this->countryProviderUserTypes()->create($data);
    }
    public function addCountryProviderUserTypeVp($data)
    {
        return $this->countryProviderUserTypeVps()->create($data);
    }
    public function addCountryProviderUserTypeStp($data)
    {
        return $this->countryProviderUserTypeStps()->create($data);
    }
    public function addCountryProviderService($data)
    {
        return $this->countryProviderServices()->create($data);
    }
    public function addCountryProviderServiceVp($data)
    {
        return $this->countryProviderServiceVps()->create($data);
    }
    public function addCountryProviderServiceStp($data)
    {
        return $this->countryProviderServiceStps()->create($data);
    }
    public function addCountryValueProposition($data)
    {
        return $this->countryValuePropositions()->create($data);
    }
    public function addCountryNetworkVp($data)
    {
        return $this->countryNetworkVps()->create($data);
    }
    public function addCountryNetworkStp($data)
    {
        return $this->countryNetworkStps()->create($data);
    }
    public function addCountryProviderVp($data)
    {
        return $this->countryProviderVps()->create($data);
    }
    public function addCountryProviderStp($data)
    {
        return $this->countryProviderStps()->create($data);
    }
    public function addCountryServiceVp($data)
    {
        return $this->countryServiceVps()->create($data);
    }
    public function addCountryServiceStp($data)
    {
        return $this->countryServiceStps()->create($data);
    }
    public function addCountryUserTypeVp($data)
    {
        return $this->countryUserTypeVps()->create($data);
    }
    public function addCountryUserTypeStp($data)
    {
        return $this->countryUserTypeStps()->create($data);
    }
    public function addCountryUserTypeServiceVp($data)
    {
        return $this->countryUserTypeServiceVps()->create($data);
    }
    public function addCountryUserTypeServiceStp($data)
    {
        return $this->countryUserTypeServiceStps()->create($data);
    }
    public function addCountryUserTypeProviderVp($data)
    {
        return $this->countryUserTypeProviderVps()->create($data);
    }
    public function addCountryUserTypeProviderStp($data)
    {
        return $this->countryUserTypeProviderStps()->create($data);
    }
    public function addCountryUserTypeProviderServiceVp($data)
    {
        return $this->countryUserTypeProviderServiceVps()->create($data);
    }
    public function addCountryUserTypeProviderServiceStp($data)
    {
        return $this->countryUserTypeProviderServiceStps()->create($data);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
