<template>
    <Link :href="route('listings.show',listing.id)"> 
        <box>
            <div class="flex items-center gap-2">
                <Price :price="listing.price" class="text-2xl"/>
                <div class="text-gray-400">
                    <Price :price="monthlyPayment" />
                </div>
                
            </div>
            <Space :listing="listing" class="text-gray-500 font-bold"/>
            <Address :listing="listing" class=" font-semibold"/>
            <div class="text-slate-700 font-semibold">
                published by {{ listing.user.name }}
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

    import {payment} from '@/Composables/usePayment'

    const props=defineProps(['listing'])

    const {monthlyPayment}=payment(props.listing.price,2.5,25);
</script>

