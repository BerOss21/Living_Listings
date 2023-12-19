<template>
    <div class="flex flex-col md:flex-row md:items-center font-semibold flex-nowrap text-xl">
        <button class="btn-transparent" @click="toogle_d_sort">Created at
            <span class="ml-2" v-if="sortData.created_at === 'asc'">
                <i class="fa-solid fa-sort-up"></i>
            </span>
            <span class="ml-2" v-else-if="sortData.created_at === 'desc'">
                <i class="fa-solid fa-sort-down"></i>
            </span>
            <span class="ml-2" v-else>
                <i class="fa-solid fa-sort"></i>
            </span>
        </button>
        <button class="btn-transparent" @click="toogle_p_sort">Price
            <span class="ml-2" v-if="sortData.price === 'asc'">
                <i class="fa-solid fa-sort-up"></i>
            </span>
            <span class="ml-2" v-else-if="sortData.price === 'desc'">
                <i class="fa-solid fa-sort-down"></i>
            </span>
            <span class="ml-2" v-else>
                <i class="fa-solid fa-sort"></i>
            </span>
        </button>
    </div>
</template>

<script setup>
    import { reactive, watch } from 'vue';
    import {debounce} from 'lodash'
    import { router } from '@inertiajs/vue3';

    const sort = ["asc", "desc", ""];

    const sortData = reactive({
        created_at: route().params.created_at ?? '',
        price: route().params.price ?? '',
    })

    const toogle_d_sort = () => {
        sortData.created_at = sortData.created_at.length ? sort[sort.indexOf(sortData.created_at) + 1] : sort[0]
    }

    const toogle_p_sort = () => {
        sortData.price = sortData.price.length ? sort[sort.indexOf(sortData.price) + 1] : sort[0]
    }

    watch(sortData, debounce(() => {
        router.get(route('realtor.listings.index'), {
            ...route().params,
            sort: sortData,
        }, {
            preserveScroll: true,
            preserveState: true,
            only:['listings']
        });
    }, 500))
</script>
