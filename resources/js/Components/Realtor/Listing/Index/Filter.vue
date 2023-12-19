<template>
    <div class="flex items-center font-semibold flex-nowrap gap-2 btn-transparent">
        <input 
            type="checkbox"  
            v-model="deletedCheckbox" 
            class="rounded"
        >
        <span class="text-xl">Deleted</span>
    </div>  
</template>

<script setup>
    import { ref, watch } from 'vue';
    import {debounce} from 'lodash'
    import { router } from '@inertiajs/vue3';

    const deletedCheckbox=ref(route().params.deleted  ?? false);

    watch(deletedCheckbox,debounce(()=>{
        router.get(route('realtor.listings.index'),{
            ...route().params,  ...route().params,
            deleted:deletedCheckbox.value
        },{
            preserveScroll:true,
            preserveState:true,
            only:['listings']
        });
    },500))
</script>


           