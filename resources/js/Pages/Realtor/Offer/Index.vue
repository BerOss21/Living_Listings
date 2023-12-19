<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-2">
        <section class="md:col-span-7 flex flex-col gap-1">
            <box v-for="(offer,index) in listing.offers" :key="index">
                <template #title>
                    <div class="flex gap-1 items-center">
                        <h3>Offer #{{ offer.id }}</h3>
                        <span class="border p-1 rounded text-white text-sm" :class="state_bg[offer.state]">
                            {{ offer.state }}
                        </span>
                    </div>
                    
                </template>
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2">
                    <div>
                        <Price class="text-xl" :price="offer.amount"/>
                        <div class="flex gap-1">
                            <span>Difference</span>
                            <Price :price="offer.amount - listing.price"/>
                        </div>
                        <div class="flex gap-1">
                            <span>Made by </span>
                            <h3>{{ offer.bidder.name }}</h3>
                        </div>
                        <div class="flex gap-1">
                            <span>Made on </span>
                            <h3>{{ offer.created_at }}</h3>
                        </div>
                    </div>
                    <div v-if="!listing.sold_at">
                        <Link :href="route('listings.offers.accept',[listing.id,offer.id])" as="button" method="put" class="border rounded py-1 px-2 bg-green-500 text-white">Accept</Link>
                    </div>
                </div>
            </box> 
        </section>
        <box class="md:col-span-5 h-max">
            <template #title>Basic info </template>
            <div class="flex flex-col gap-1">
                <Price class="text-2xl font-bold" :price="listing.price"/>
                <Space class="font-semibold text-lg" :listing=listing />
                <Address :listing=listing />
            </div>
        </box>
    </div>
</template>

<script setup>
    import Box from "@/Components/Ui/Box.vue";
    import Price from "@/Components/listing/Price.vue";
    import Address from "@/Components/listing/Address.vue";
    import Space from "@/Components/listing/Space.vue";
    import { Link } from "@inertiajs/vue3";


    const props=defineProps({
        listing:Object
    })

    const state_bg={
        'accepted':'bg-green-500',
        'rejected':'bg-red-500',
        'pending':'bg-orange-500',
    }
</script>

