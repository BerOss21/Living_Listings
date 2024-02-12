<template>
    <template v-if="notifications.length">
        <box v-for="(notification,index) in notifications" :key="index" :class="{'bg-orange-200':!notification.read_at}" class="mb-2">
            <div class="flex flex-col gap-2 md:flex-row md:justify-between">
                <div>
                <Link :href="route('listings.offers.index',notification.data.listing_id)" class="text-indigo-700 font-semibold"> Offer </Link> made by {{ notification.data.bidder.name }} for  <Link :href="route('realtor.listings.show',notification.data.listing_id)">Listing #{{ notification.data.listing_id }}</Link> on {{ notification.data.created_at }}
                </div>
                <Link v-if="!notification.read_at" :href="route('notifications.read',notification.id)" as='button' method="put" preserve-scroll preserve-state="" class="border bg-slate-200 py-1 px-1 font-medium rounded">Make as read</Link>
                <Link v-else :href="route('notifications.unread',notification.id)" as='button' method="put" preserve-scroll preserve-state="" class="border bg-slate-200 py-1 px-1 font-medium rounded">Make as unread</Link>
            </div>
        </box>
    </template>
    <AlertMessage v-else message="Any notification has been received"/>
  
   
</template>

<script setup>
    import Box from "@/Components/Ui/Box.vue";
    import AlertMessage from "@/Components/Ui/AlertMessage.vue";
    import { Link } from "@inertiajs/vue3";

    const props=defineProps({
        notifications:Array
    })

</script>

