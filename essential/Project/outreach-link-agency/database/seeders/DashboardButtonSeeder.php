<?php

namespace Database\Seeders;

use App\Models\DashboardStatisticsButton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $button_settings = [
            [
                'name'              => 'Place Order',
                'icon'              => '<i class="uil-search"></i>',
                'route_url'         => 'sites.index',
                'status'            => 1,
            ],
            [
                'name'              => 'See My Order',
                'icon'              => '<i class="dripicons-view-list"></i>',
                'route_url'         => 'order.index',
                'status'            => 1,
            ],
            [
                'name'              => 'Edit Profile',
                'icon'              => '<i class="uil-user"></i>',
                'route_url'         => 'user-profile.index',
                'status'            => 1,
            ],
            [
                'name'              => 'Talk to SEO Expert',
                'icon'              => '<i class="uil-comment-alt-dots"></i>',
                'route_url'         => 'contact.index',
                'status'            => 2,
            ],
            [
                'name'              => 'Buy Content',
                'icon'              => '<i class="uil-clipboard-notes"></i>',
                'route_url'         => 'content-buy.index',
                'status'            => 1,
            ],
            [
                'name'              => 'View Content Order',
                'icon'              => '<i class="dripicons-preview"></i>',
                'route_url'         => 'content-order.view',
                'status'            => 1,
            ],
            [
                'name'              => 'Buy Package',
                'icon'              => '<i class="fas fa-box"></i>',
                'route_url'         => 'package-buy.index',
                'status'            => 1,
            ],
            [
                'name'              => 'Package Orders',
                'icon'              => '<i class="fas fa-boxes"></i>',
                'route_url'         => 'package-order.view',
                'status'            => 1,
            ],
            [
                'name'              => 'View Wallet Transaction',
                'icon'              => '<i class="dripicons-to-do"></i>',
                'route_url'         => 'wallet.index',
                'status'            => 2,
            ],
            [
                'name'              => 'Knowledge Base',
                'icon'              => '<i class="uil-lightbulb-alt"></i>',
                'route_url'         => 'dashboard',
                'status'            => 2,
            ]
        ];

        foreach ($button_settings as $button_setting) {
            DashboardStatisticsButton::create($button_setting);
        }
    }
}
