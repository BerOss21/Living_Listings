<template>
    <div>
        {{ listing.street }} {{ listing.street_nr }}, {{ listing.code }}, {{ listing.city }}
    </div>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3";

    const props=defineProps({
        listing:{
            type:Object
        }
    });
</script>

