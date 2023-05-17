<template>
    <div>
        <title>Outrich Link Agency</title>
        <!--  Site Header & Sub Headers -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center border-0" style="padding: 15px 10px 0px 10px">
                        <h4 class="m-auto">
                            {{ explore_header.description }}
                        </h4>

                        <span style="align-items: flex-end">
                            <button class="btn mb-2" type="button" data-bs-toggle="collapse"
                                data-bs-target=".multi-collapse" aria-expanded="false"
                                aria-controls="multiCollapseExample1 multiCollapseExample2"
                                style="color: #55729e; font-size: 16px">
                                <i class="fas fa-chevron-circle-down"></i>
                            </button>
                        </span>
                        <div class="row">
                            <div class="col-lg-4 mb-2" v-for="all_site in explore_sub_header">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body mb-0">
                                        <span class="explore_site_title" style="font-weight: 700; color: #55729e;">
                                            {{ all_site.title }}
                                        </span>
                                        <span style="text-align: start">{{
                                            all_site.description
                                        }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Search, Sort & Filter -->
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="mb-3">
                    <div class="search-box ms-2">
                        <div class="position-relative">
                            <input type="text" class="form-control rounded border-0" placeholder="Search..." />
                            <i class="mdi mdi-magnify search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <select class="form-control" name="servicetype">
                        <option>Oldest</option>
                        <option>Latest</option>
                        <option>Price: High to Low</option>
                        <option>Price: Low to High</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <button type="button" class="btn waves-effect waves-light form-control"
                    style="background-color: white;color: #55729e;font-weight: 900;" data-bs-toggle="modal"
                    data-bs-target=".bs-filter-modal">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </div>
        <!-- Site List -->
        <div class="row">
            <div class="col-xl-12 col-sm-12" v-for="item in all_sites">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1 align-self-center">
                                <div class="d-flex">
                                    <span class="text-truncate font-size-12 mb-1 pe-2 ps-2 me-2"
                                        style="background-color: #55729e; border-radius: 25px; color: aliceblue"><i
                                            class="bx bxs-select-multiple" v-for="service in item.services"> {{ service.name
                                            }} </i> </span>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mt-3">
                                                    <div class="my-2" style="display: grid">
                                                        <a :href="item.domain_url" target="_blank"
                                                            style="font-weight: 700; font-size: 18px">{{ item.domain
                                                            }}</a>
                                                        <span
                                                            style="font-family: 'Cambria', 'Cochin', 'Georgia', 'Times', 'Times New Roman', 'serif'">{{
                                                                item.site_name }}</span>
                                                    </div>
                                                    <div class="mt-3">
                                                        <span class="custome-explore" v-for="category in item.categories">{{
                                                            category.name }}</span>
                                                    </div>
                                                    <div class="mt-3">
                                                        <a href="{{ route('explore-site.create') }}"
                                                            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
                                                            target="_blank"><i class="uil-exclamation-circle"
                                                                style="font: bold"> View Site Info </i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3" style="column-count: 2">
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-crown"></i> Domain
                                                        Authority</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900">{{ item.moz_domain_authority }}</span>
                                                </p>
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-star"></i> Domain
                                                        Rating</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900">{{ item.ahref_domain_rating }}</span>
                                                </p>
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-user-friends"></i>
                                                        Organic Traffic</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900">{{ item.ahref_organic_traffic }}</span>
                                                </p>
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-question"></i> Spam
                                                        Score</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900">{{ item.moz_spam_score }}</span>
                                                </p>
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-language"></i>
                                                        Language</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900" v-for="language in item.languages">{{
                                                            language.name }}</span>
                                                </p>
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-link"></i>
                                                        Links</small>
                                                    <span class="badge bg-soft-success font-size-14"
                                                        style="font-weight: 900" v-for="link in item.hyperlink_type">{{
                                                            link.name }}</span>
                                                </p>
                                            </div>
                                            <div class="col-md-2 mt-3" style="column-count: 1">
                                                <p style="margin-bottom: 1rem">
                                                    <small class="text-style me-2"><i class="fas fa-globe-asia"></i>
                                                        Countries :</small>
                                                    <span class="text-style" v-for="country in item.countries">
                                                        {{ country.name }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2" style="border-left: 2px dashed rgb(72, 94, 221)">
                                        <div class="mt-3 text-center" style="display: grid">
                                            <span class="font-size-22 mb-2"
                                                style="font-weight: 900; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">$70</span>
                                            <!-- <form action="{{ route('checkout.list', ['type' => 'exploreSiteService']) }}"
                                                method="POST">
                                                @csrf -->
                                            <!-- <input type="hidden" name="exploresite_id" value="{{ $data->id }}"> -->
                                            <button class="button-style btn btn-otr-primary">
                                                <b> Buy Now</b>
                                            </button>
                                            <!-- </form> -->
                                        </div>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="#" style="top" class="campaign-add" data-bs-toggle="modal"
                                                data-bs-target=".bs-campaign-modal" @click="sendInfo(item)">
                                                Add to Campaign
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--  Filter modal -->
        <div class="modal fade bs-filter-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text text-center">
                        <h5 class="modal-title"
                            style="color: #55729e; font-weight: 900; font-family: 'Gill Sans', 'Gill Sans MT',Calibri, 'Trebuchet MS', sans-serif; font-size: 22px;">
                            Advance Filter
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <form class="custom-validation" action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Domain Authority</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>0-10</option>
                                                <option>11-20</option>
                                                <option>21-31</option>
                                                <option>40-50</option>
                                                <option>51-60</option>
                                                <option>61-70</option>
                                                <option>71-80</option>
                                                <option>81-90</option>
                                                <option>91-100</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Domain Rating</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>0-10</option>
                                                <option>11-20</option>
                                                <option>21-31</option>
                                                <option>40-50</option>
                                                <option>51-60</option>
                                                <option>61-70</option>
                                                <option>71-80</option>
                                                <option>81-90</option>
                                                <option>91-100</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Price</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>Select Price</option>
                                                <option>0-50</option>
                                                <option>51-100</option>
                                                <option>101-200</option>
                                                <option>201-300</option>
                                                <option>301-400</option>
                                                <option>401-500</option>
                                                <option>501-600</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Traffic</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>Select Traffic</option>
                                                <option>0-1000</option>
                                                <option>1001-5000</option>
                                                <option>5001-10000</option>
                                                <option>10001-50000</option>
                                                <option>50001-100000</option>
                                                <option>1000001-1000000</option>
                                                <option>10000001-~</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Categories</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>Select Categories</option>
                                                <option>San Francisco</option>
                                                <option>New York</option>
                                                <option>Seattle</option>
                                                <option>Los Angeles</option>
                                                <option>Chicago</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Country</label>
                                            <input class="form-control" list="country" id="exampleDataList"
                                                placeholder="Type to search country..." />
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option value="">China</option>
                                                <option value="">USA</option>
                                                <option value="">
                                                    Austrila
                                                </option>
                                                <option value="">
                                                    Srilanka
                                                </option>
                                                <option value="">India</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Link Types</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>
                                                    Select Service Type
                                                </option>
                                                <option>Nofollow</option>
                                                <option>Dofollow</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Sponsored Post</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>Any</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Link Insertion</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>Any</option>
                                                <option>Yes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Addon Link</label>
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>
                                                    Select Service Type
                                                </option>
                                                <option>Nothing</option>
                                                <option>Text</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Filter by Domain</label>
                                            <input class="form-control" list="domain" id="exampleDataList"
                                                placeholder="Type to search domain..." />
                                            <select class="form-control selectpicker" data-live-search="true" name="">
                                                <option>.com</option>
                                                <option>.net</option>
                                                <option>.org</option>
                                                <option>.info</option>
                                                <option>.biz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-3 text-center">
                                        <button type="submit" class="btn waves-effect waves-light w-md"
                                            style="font-family: 'Gill Sans','Gill Sans MT', Calibri,'Trebuchet MS', sans-serif; color: white; background-color: #55729e; font-weight: 900;">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- End modal -->
        <!--  Campaign modal -->
        <div class="modal fade bs-campaign-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text text-center">
                        <h5 class="modal-title"
                            style="color: #55729e; font-weight: 900; font-family: 'Gill Sans', 'Gill Sans MT',Calibri, 'Trebuchet MS', sans-serif; font-size: 22px;">
                            Add To Campaign
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p class="text-center mb-3 text-primary" style="font-size: 1.5rem">
                                {{ selectedSite.domain }}
                            </p>
                        </div>
                        <div class="row">
                            <form @submit.prevent="form.post(route('campaign.store'))">
                                <div class="col-md-12">
                                    <label for="newCampaign" class="form-label">Create New Campaign</label>
                                    <input type="text" class="form-control" id="newCampaign"
                                        placeholder="Enter Landing Domain (examle.com)" v-model="form.new_campaign">
                                </div>
                                <h2
                                    style="width: 100%; text-align: center;  border-bottom: 1px solid rgba(87, 85, 85, 0.7); line-height: 0.1em; margin: 30px 0 30px;">
                                    <span class="text-dark"
                                        style=" background:#fff; padding:0 10px; font-size: 1.5rem">or</span>
                                </h2>
                                <div class="form-group pb-3">
                                    <label for="campaignId">Choose from Saved Campaigns</label>
                                    <select id="campaignId" class="form-control" v-model="form.old_campaign">
                                        <option>None</option>
                                        <option value="247">wildlife.com</option>
                                        <option value="250">hhgh.com</option>
                                        <option value="359">topdogtips.com</option>
                                        <option value="403">test.com</option>
                                        <option value="404">sobuj.com</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-otr-primary campaign-actions">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Link, useForm } from '@inertiajs/vue3'
export default {
    components: {
        Link
    },
    setup() {
        const form = useForm({
            new_campaign: '',
            old_campaign: ''
        })

        return { form }
    },
    props: {
        all_sites: Object,
        explore_sub_header: Object,
        explore_header: Object,
    },

    data: () => ({
        selectedSite: '',
        campaign: {
            new_campaign: '',
            old_campaign: '',
        }
    }),
    methods: {
        sendInfo(item) {
            this.selectedSite = item
        },
        addToCampaign() {

        }
    }
};
</script>
<style scoped>
/* .explore_site_title {
    font-weight: 700;
    color: #55729e;
} */
.campaign-actions {
    padding: .75rem 3.75rem;
}

.button-style {
    text-align: center;
    line-height: 32px;
    color: #fff;
    font-size: 18px;
    text-transform: uppercase;
    text-decoration: none;
    font-family: sans-serif;
    box-sizing: border-box;
}

.button-style:hover {
    animation: animate 8s linear infinite;
}

.campaign-add:hover {
    text-decoration: underline !important;
}
</style>
