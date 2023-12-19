<template>
    <div>
        <span>{{ listing.beds }} beds</span> | <span>{{ listing.baths }} baths</span> | {{ listing.area }} m2
    </div>
</template>

<script setup>

    defineProps({
        listing:{type:Object}
    })

</script>

