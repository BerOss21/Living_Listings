<template>
    <form @submit.prevent="filter">
        <div class="flex flex-wrap gap-2">
            <div class="flex w-full md:w-auto ">
                <input type="text" v-model="form.price_from" class="filter-input-left placeholder:text-slate-700 w-28"
                    placeholder="Price from">
                <input type="text" v-model="form.price_to" class="filter-input-right placeholder:text-slate-700 w-28"
                    placeholder="Price to">
            </div>
            <div class="flex w-full md:w-auto">
                <select v-model="form.beds" class="filter-input-left">
                    <option value="" selected>Beds</option>
                    <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
                    <option value="+6">+6</option>
                </select>
                <select v-model="form.baths" class="filter-input-right">
                    <option value="" selected>Baths</option>
                    <option v-for="n in 5" :value="n" :key="n">{{ n }}</option>
                    <option value="+6">+6</option>
                </select>
            </div>
            <div class="flex w-full md:w-auto ">
                <input type="text" v-model="form.area_from" class="filter-input-left placeholder:text-slate-700 w-28"
                    placeholder="Area from">
                <input v-model="form.area_to" type="text" class="filter-input-right placeholder:text-slate-700 w-28"
                    placeholder="Area to">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="btn-secondary">Filter</button>
                <button class="btn-transparent" @click.prevent="resetForm">Clear</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from "@inertiajs/vue3";

    const props=defineProps({
        filters:{
            type:Object,
            default:null
        }
    })

    const form=useForm({
        price_from:props.filters.price_from ?? null,
        price_to:props.filters.price_to ?? null,
        beds:props.filters.beds ?? null,
        baths:props.filters.baths ?? null,
        area_from:props.filters.area_from ?? null,
        area_to:props.filters.area_to ?? null,
    })

    const filter=()=>{
        form.get(route('listings.index'),{
            preserveScroll: true,
            preserveState:true
        });
    }

    const resetForm=()=>{
        form.price_from= null;
        form.price_to=null;
        form.beds=null;
        form.baths=null;
        form.area_from=null;
        form.area_to=null;
        
        filter();
    }

</script>

