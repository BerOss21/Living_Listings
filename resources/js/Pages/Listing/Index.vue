<template>
    <div>
        <Filter class="my-5 w-full" :filters="filters"/>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
            <SingleListing v-for="(item,index) in listings.data" :key="index" :listing="item" />
        </div>
        <Pagination class="w-full mt-3" :links="listings.links"/>
    </div>
</template>

<script setup>
    import SingleListing from '@/Components/Listing/Index/SingleListing.vue';
    import Pagination from '@/Components/Ui/Pagination.vue';
    import Filter from '@/Components/Listing/Index/Filter.vue';

    const props=defineProps({
        listings:{
            type:Object
        },
        filters:{
            type:Object,
            default:[]
        }
    })

</script>
