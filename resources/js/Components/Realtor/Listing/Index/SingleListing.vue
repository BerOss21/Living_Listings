<template>
    <Link :href="route('realtor.listings.show', listing.id)">
        <box :class="{'opacity-50':listing.deleted_at}">
            <div class="flex flex-col h-full justify-between md:flex-row md:items-center">
                <section>
                    <div class="flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl" />
                        <div class="text-gray-400">
                            <Price :price="monthlyPayment" />
                        </div>
                    </div>
                    <Space :listing="listing" class="text-gray-500 font-bold" />
                    <Address :listing="listing" class=" font-semibold" />
                    <div class="mt-2">
                        {{ listing.created_at }}
                    </div>
                </section>

                <section class="flex flex-col gap-1">
                    <div class="flex gap-1">
                        <Link :href="route('realtor.listings.edit', listing.id)" as='button' class="border rounded px-2 py-1 bg-green-400 font-semibold text-white">Edit</Link>
                        <Link v-if="listing.deleted_at" 
                            :href="route('realtor.listings.restore', listing.id)" 
                            as='button' 
                            method="put" 
                            class="border rounded px-2 py-1 bg-gray-400 font-semibold text-white"
                            preserve-state
                            preserve-scroll
                        >Restore</Link>
                        <Link v-else 
                            :href="route('realtor.listings.destroy', listing.id)" 
                            preserve-state
                            preserve-scroll
                            method="delete" as='button' class="border rounded px-2 py-1 bg-red-400 font-semibold text-white"
                        >delete</Link>
                    </div>

                    <div class="w-full flex flex-col gap-1">
                        <Link 
                            :href="route('realtor.listings.images.upload', listing.id)" 
                            as='button' class="w-full text-white font-semibold bg-slate-700 py-1 px-2 rounded"
                        >Images ({{ listing.media_count }})</Link>
                        <Link 
                            :href="route('listings.offers.index', listing.id)" 
                            as='button' class="w-full text-white font-semibold bg-slate-400 py-1 px-2 rounded"
                        >Offers ({{ listing.offers_count }})</Link>
                    </div>
                </section>
            </div>

        </box>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Address from '@/Components/Listing/Address.vue';
import Space from '@/Components/Listing/Space.vue';
import Price from '@/Components/Listing/Price.vue';
import Box from '@/Components/Ui/Box.vue';

import { payment } from '@/Composables/usePayment'

const props = defineProps(['listing'])

const { monthlyPayment } = payment(props.listing.price, 2.5, 25);
</script>

