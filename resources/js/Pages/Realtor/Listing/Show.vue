<template>
    <div class="container flex flex-col-reverse gap-4 md:grid md:grid-cols-12">  
        <box class="md:col-span-7">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-1" v-if="listing.media.length">
                <div v-for="(image,index) in listing.media" :key="index" class="border border-slate-400 rounded">
                    <img :src="image.original_url" :alt="index" class="w-full h-full">
                </div>
            </div>
            <div v-else class="flex justify-center items-center h-full w-full">
                <div>
                    No image
                </div>
            </div>
        </box>
        <div class="flex flex-col gap-4 md:col-span-5">
            <box>
                <template #title>
                    Basic info
                </template>
                <Price :price="listing.price"/> 
                <Space :listing="listing" class="text-gray-500 font-bold"/> 
                <Address :listing="listing" class=" font-semibold"/>   
            </box>  
            <box>
                <template #title>
                    Monthly Payment
                </template>
                
                <div class="mt-1">
                    <h3 class="font-bold text-gray-600 mb-1">Intereset rate ({{ interset_rate }})</h3>
                    <input type="range" v-model="interset_rate" min="0.1" max="2.5" step="0.1" class="appearance-none cursor-pointer h-4 accent-indigo-400 bg-gray-200 rounded-lg w-full focus:accent-indigo-500" >
                </div>
                <div class="mt-1">
                    <h3 class="font-bold text-gray-600 mb-1">Duration ({{ duration }} years)</h3>
                    <input type="range" v-model="duration" min="2" max="25" step="1" class="appearance-none cursor-pointer h-4 accent-indigo-400 bg-gray-200 rounded-lg w-full focus:accent-indigo-500" >
                </div>

                <div class="mt-3">
                    <h3 class="font-bold text-gray-600 mb-1">Your monthly payment</h3>
                    <Price :price="monthlyPayment" class="text-2xl"/>
                </div>

                <div class="mt-3">
                    <div class="flex justify-between">
                        <h4>Total payed</h4>
                        <Price :price="totalPayed"/>
                    </div>

                    <div class="flex justify-between">
                        <h4>Principal payed</h4>
                        <Price :price="amount"/>
                    </div>

                    <div class="flex justify-between">
                        <h4>Interest payed</h4>
                        <Price :price="interestPayed"/>
                    </div>
                </div>
            </box> 
        </div>     
    </div>
</template>

<script setup>
    import Box from '@/Components/Ui/Box.vue';
    import Space from '@/Components/Listing/Space.vue';
    import Address from '@/Components/Listing/Address.vue';
    import Price from '@/Components/Listing/Price.vue';
    import {payment} from '@/Composables/usePayment';

    import {ref} from 'vue';
    import { usePage } from '@inertiajs/vue3';

    const props=defineProps({
        listing:Object
    })

    const interset_rate=ref(2.5);
    const duration=ref(25);

    const amount=ref(props.listing.price);

    const {monthlyPayment, totalPayed, interestPayed} =payment(amount,interset_rate,duration)

</script>
