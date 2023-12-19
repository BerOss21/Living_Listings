<template>
    <box>
        <template #title>
            Offer Made
        </template>
       <div class="flex flex-col gap-1">
            <Price class="text-xl" :price="offer.amount"/>
            <div class="flex justify-between font-semibold">
                <h3>Made on</h3>
                <h3>{{ offer.created_at }}</h3>
            </div>
       </div>
    </box>
</template>

<script setup>
    import Box from "@/Components/Ui/Box.vue";
    import Price from "@/Components/Listing/Price.vue";

    defineProps({
        offer:Object
    })

</script>

