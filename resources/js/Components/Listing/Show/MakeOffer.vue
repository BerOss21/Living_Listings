<template>
    <div>
        <box>
            <template #title>
                Make an offer
            </template>

            <div class="flex flex-col gap-1 w-full">
                <input type="text" class="input" v-model="form.amount">
                <input type="range" v-model="form.amount" :min="min" :max="max" step="500" class="appearance-none cursor-pointer h-4 accent-indigo-400 bg-gray-200 rounded-lg w-full focus:accent-indigo-500" >
            </div>

            <button class="btn-secondary my-1 w-full" @click="makeOffer">Make an offer</button>

            <div class="flex justify-between items-center">
                <h3>Difference</h3>
                <Price :price="difference"/>
            </div>
        </box>
    </div>
</template>

<script setup>
    import Price from "@/Components/Listing/Price.vue";
    import Box from "@/Components/Ui/Box.vue";
    import { useForm } from "@inertiajs/vue3";
    import { computed, watch } from "vue";
    import {debounce} from 'lodash'

    const props=defineProps({
        price:Number,
        listing_id:Number
    })

    const emits=defineEmits(['amountModified']);

    const form=useForm({
        amount:props.price
    })

    const min=computed(()=>Math.round(props.price/2))
    const max=computed(()=>Math.round(props.price*2))

    const difference=computed(()=>{
        return form.amount - props.price;
    })

    const makeOffer=()=>{
        form.post(route('listings.offers.store',props.listing_id),{
            preserveState:true,
            preserveScroll:true
        });
    }

    watch(()=>form.amount, debounce(() => {
        emits('amountModified',form.amount);
    }, 400))
</script>

