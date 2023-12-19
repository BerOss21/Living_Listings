<template>
    <div>
        <h2 class="font-bold text-3xl">Your listings ({{listings.total}})</h2>
        <div class="my-5 w-full flex flex-col md:flex-row md:items-center gap-1">
            <Filter/>
            <Sort/>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2  gap-3">
            <SingleListing v-for="(item,index) in listings.data" :key="index" :listing="item" :class="{'bg-green-200':item.sold_at}" />
        </div>
        <Pagination v-if="listings.total>10" class="w-full mt-3" :links="listings.links"/>
    </div>
</template>

<script setup>
    import SingleListing from '@/Components/Realtor/Listing/Index/SingleListing.vue';
    import Pagination from '@/Components/Ui/Pagination.vue';
    import Filter from '@/Components/Realtor/Listing/Index/Filter.vue';
    import Sort from '@/Components/Realtor/Listing/Index/Sort.vue';

    const props=defineProps({
        listings:{
            type:Object
        }
    })

</script>
